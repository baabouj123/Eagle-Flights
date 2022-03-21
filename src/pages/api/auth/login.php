<?php

use app\core\Application;

return function (\app\core\Request $req, \app\core\Response $res) {
    $userController = new \app\controllers\User();

    $errors = $userController->validate($req->body, [
        'email' => 'required|email|exist',
        'password' => 'required|min:6'
    ]);

    if ($errors) {
        $res->json(['success' => false, 'errors' => $errors]);
    } else {
        $user = $userController->model->findUnique([
            "where" => [
                "email" => $req->body['email'],
            ],
            "select" => [
                "id", "password"
            ]
        ]);

        $login_attempts = new \app\models\LoginAttempts();

        $attempts = $login_attempts->count([
            "where" => [
                "user_id" => $user->id,
                "timestamp" => [
                    "gte" => time() - 60 * 60
                ]
            ]
        ]);

        if ((int)$_ENV["MAX_LOGIN_ATTEMPTS_PER_HOUR"] <= $attempts){
            $res->json(['success' => false, 'errors' => ["password" => "Too much attempts! Please try again later"]]);
        }

        if (\app\lib\Hash::verify($req->body['password'], $user->password)) {
            $auth = new \app\controllers\Auth();
            $auth_tokens = new \app\models\AuthTokens();
            $token = uid();
            $login_attempts->delete([
                "where" => [
                    "user_id" => $user->id
                ]
            ]);
            $auth_tokens->create([
                "data" => [
                    "token" => $token,
                    "user_id" => $user->id,
                    "expires" => time() + (60 * 60 * 2)
                ]
            ]);
            Application::$app->session->set("auth_token", $token);
            $res->json(['success' => true, "message" => "Logged successfully"]);
        } else {
            $login_attempts->create([
                    "data" => [
                        "user_id" => $user->id,
                        "timestamp" => time()
                    ]
                ]
            );
            $res->json(['success' => false, 'errors' => ["password" => "incorrect password"]]);
        }
    }
};