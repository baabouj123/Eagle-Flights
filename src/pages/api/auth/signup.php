<?php

use app\core\Application;

return function (\app\core\Request $req, \app\core\Response $res) {
    $userController = new \app\controllers\User();

    $errors = $userController->validate($req->body, [
        'name' => 'required',
        'email' => 'required|email|unique',
        'password' => 'required|min:6'
    ]);

    if ($errors) {
        $res->json(['success' => false, 'errors' => $errors]);
    } else {
        $password = \app\lib\Hash::hash($req->body["password"]);
        if ($userController->model->create(
            [
                "data" => [
                    'name' => $req->body["name"],
                    'email' => $req->body["email"],
                    'password' => $password,
                ]
            ]
        )) {
            $auth = new \app\controllers\Auth();
            $token = $auth->generateToken();
            $auth->model->create([
                "data" => [
                    "token" => $token,
                    "user_id" => $userController->model->findUnique([
                            "where" => [
                                "email" => $req->body['email'],
                            ],
                            "select" => ["id"]
                        ]
                    )->id,
                    "expires" => time() + (60 * 60 * 2)
                ]
            ]);
            Application::$app->session->set("auth_token", $token);
            $res->status(201)->json(['success' => true, "message" => "Signed up successfully"]);
        } else {
            $res->json(['success' => false, 'error' => "Something went wrong!"]);
        }
    }
};