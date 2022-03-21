<?php

namespace app\models;

class Flight extends \app\core\Model
{

    public function schema(): array
    {
        return [
            'model' => 'flights',
            'attributes' => [
                'id', 'departure', 'destination', 'departure_date', 'arrival_date'
            ]
        ];
    }
}