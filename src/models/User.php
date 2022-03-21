<?php

namespace app\models;


class User extends \app\core\Model
{
    public function schema(): array
    {
        return [
            'model' => 'users'
        ];
    }
}