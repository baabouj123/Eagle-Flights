<?php

namespace app\models;

class Booking extends \app\core\Model
{

    public function schema(): array
    {
        return [
            'model' => 'bookings',
            'attributes' => [
                'id', 'user_id', 'flight_id', 'ticket'
            ],
            'relations' => [
                'flights' => [
                    'field' => 'flight_id',
                    'ref' => 'id'
                ],
                'users' => [
                    'field' => 'user_id',
                    'ref' => 'id'
                ]
            ]
        ];
    }
}