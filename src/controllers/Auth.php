<?php

namespace app\controllers;

use app\core\Application;

class Auth extends \app\core\Controller
{
    public function generateToken(int $length = 24): string
    {
        return bin2hex(random_bytes($length));
    }

    public function getSessionToken()
    {
        return $this->model->findUnique([
                "where" => [
                    "token" => Application::$app->session->get("auth_token")
                ],
                "select" => [
                    "user_id"
                ]
            ]);
    }
}