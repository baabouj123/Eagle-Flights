<?php

namespace app\core;

abstract class Model
{

    private Database $db;

    public function __construct()
    {
        $this->db = \app\core\Application::$app->db;
    }

    public function create(array $options): bool
    {
        $table = $this->schema()['model'];
        $attributes = array_keys($options['data']);
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $query = "INSERT INTO $table (" . implode(",", $attributes) . ") VALUES (" . implode(",", $params) . ")";

        $this->db->query($query);
        foreach ($attributes as $attr) {
            $this->db->bind(":$attr", $options['data'][$attr]);
        }

        return $this->db->execute();
    }

    public function update(array $options): bool
    {
        $table = $this->schema()['model'];
        $attributes = array_keys($options['data']);
        $params = array_map(fn($attr) => "$attr = :$attr", $attributes);

        $where = $options['where'];
        $where_attrs = array_keys($where);
        $sql = implode(" AND ", array_map(fn($attr) => "$attr = :$attr", $where_attrs));

        $this->db->query("UPDATE $table SET " . implode(",", $params) . " WHERE $sql");

        foreach ($attributes as $attr) {
            $this->db->bind(":$attr", $options['data'][$attr]);
        }

        foreach ($where as $key => $value) {
            $this->db->bind(":$key", $value);
        }

        return $this->db->execute();
    }

    public function delete(array $options): bool
    {
        $table = $this->schema()['model'];
        $where = $options['where'];
        $attributes = array_keys($where);
        $sql = implode(" AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $this->db->query("DELETE FROM $table WHERE $sql");
        foreach ($where as $key => $value) {
            $this->db->bind(":$key", $value);
        }
        return $this->db->execute();
    }

    public function findUnique(array $options)
    {
        $table = $this->schema()['model'];
        $select = $options['select'] ? implode(',', $options['select']) : '*';
        $query = "SELECT $select FROM $table ";
        $include = $options['include'] ?? false;
        $where = $options['where'];
        if ($include !== false) {
            foreach ($include as $key => $value) {
                $field = $this->schema()['relations'][$key]['field'];
                $ref = $this->schema()['relations'][$key]['ref'];
                $query .= "LEFT JOIN $key ON $key.$ref = $table.$field ";
            }
        }
        $attributes = array_keys($where);
        $sql = implode(" AND ", array_map(fn($attr) => "$table.$attr = :$attr", $attributes));
        $query .= " WHERE $sql";
        $this->db->query($query);
        foreach ($where as $key => $value) {
            $this->db->bind(":$key", $value);
        }
        return $this->db->resultSet()[0] ?? false;
    }

    public function findMany(array $options = []): bool|array
    {
        $table = $this->schema()['model'];
        $select = $options['select'] ? implode(',', $options['select']) : '*';
        $query = "SELECT $select FROM $table ";
        $include = $options['include'] ?? false;
        $where = $options['where'] ?? false;
        $orderBy = $options['orderBy'] ?? false;
        $take = $options['take'] ?? false;
        $skip = $options['skip'] ?? false;
        $binders = [];
        if ($include !== false) {
            foreach ($include as $key => $value) {
                $field = $this->schema()['relations'][$key]['field'];
                $ref = $this->schema()['relations'][$key]['ref'];
                $query .= "LEFT JOIN $key ON $key.$ref = $table.$field ";
            }
        }
        if ($where !== false) {
            $query .= $this->generateWhereQuery($where, $binders);
        }
        if ($orderBy !== false) {
            $by = is_array($orderBy) ? $orderBy[0] : $orderBy;
            $order = is_array($orderBy) ? strtoupper($orderBy[1]) : strtoupper('asc');

            $query .= "ORDER BY $by $order ";
        }
        if ($take !== false) {
            $skip = $skip !== false ? $skip : 0;
            $query .= "LIMIT $skip, $take ";
        }


        $this->db->query($query);

        foreach ($binders as $key => $value) {
            $this->db->bind(":$key", $value);
        }
        return $this->db->resultSet();
    }

    public function count(array $options = []): int|bool
    {
        $table = $this->schema()['model'];
        $where = $options['where'] ?? false;
        $binders = [];
        if ($where !== false) {
            $whereQuery = $this->generateWhereQuery($where, $binders);
            $this->db->query("SELECT COUNT(*) AS count FROM $table $whereQuery");
            foreach ($binders as $key => $value) {
                $this->db->bind(":$key", $value);
            }
        } else {
            $this->db->query("SELECT COUNT(*) AS count FROM $table");
        }
        return $this->db->resultSet()[0]->count ?? false;
    }

    protected function generateWhereQuery($where, &$binders): string
    {
        $attributes = array_keys($where);
        $whereQuery = [];
        foreach ($attributes as $attr) {
            if (is_array($where[$attr])) {
                foreach ($where[$attr] as $operator => $value) {
                    switch ($operator) {
                        case "gt":
                        {
                            $whereQuery[] = "$attr > :$attr" . "_" . "gt";
                            $binders[$attr . "_" . "gt"] = $value;
                            break;
                        }
                        case "gte":
                        {
                            $whereQuery[] = "$attr >= :$attr" . "_" . "gte";
                            $binders[$attr . "_" . "gte"] = $value;
                            break;
                        }
                        case "lt":
                        {
                            $whereQuery[] = "$attr < :$attr" . "_" . "lt";
                            $binders[$attr . "_" . "lt"] = $value;
                            break;
                        }
                        case "lte":
                        {
                            $whereQuery[] = "$attr <= :$attr" . "_" . "lte";
                            $binders[$attr . "_" . "lte"] = $value;
                            break;
                        }
                        case "eq":
                        {
                            $whereQuery[] = "$attr = :$attr" . "_" . "eq";
                            $binders[$attr . "_" . "eq"] = $value;
                            break;
                        }
//                        case "contains":
//                        {
//                            $whereQuery[] = "$attr LIKE '%:$attr" . "_" . "contains%'";
//                            $binders[$attr . "_" . "contains"] = $value;
//                            break;
//                        }
                        default:
                        {
                            break;
                        }
                    }
                }
            } else {
                $whereQuery[] = "$attr = :$attr";
                $binders[$attr] = $where[$attr];
            }
        }

        $sql = implode(" AND ", $whereQuery);
        return "WHERE $sql ";
    }

    abstract public function schema(): array;

}