<?php

namespace app\controllers;

use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\lib\Hash;

class User extends \app\core\Controller
{
    public int $id;
    public string $name;
    public string $email;
    public string $role;

    public function set($user)
    {
        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
    }

    public function getAuthenticatedUser($user_id)
    {
        return $this->model->findUnique(
            [
                "where" => [
                    "id" => $user_id
                ],
                "select" => [
                    "id", "name", "email", "role"
                ]
            ]
        );
    }

    public function isAdmin(): bool
    {
        return $this->role == "admin";
    }
}