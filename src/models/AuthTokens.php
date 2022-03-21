<?php

namespace app\models;

class AuthTokens extends \app\core\Model
{
    public function schema(): array
    {
        return [
            'model' => 'auth_tokens'
        ];
    }
}