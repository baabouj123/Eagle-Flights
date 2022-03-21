<?php

namespace app\models;

class Auth extends \app\core\Model
{
    public function schema(): array
    {
        return [
            'model' => 'auth_tokens'
        ];
    }
}