<?php

namespace app\models;

class LoginAttempts extends \app\core\Model
{

    public function schema(): array
    {
        return [
            'model' => 'login_attempts'
        ];
    }
}