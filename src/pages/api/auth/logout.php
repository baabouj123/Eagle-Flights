<?php

use app\core\Application;

return function (\app\core\Request $req, \app\core\Response $res) {
    Application::$app->auth->model->delete([
        "where" => [
            "user_id" => Application::$app->user->id
        ]
    ]);
    Application::$app->user = null;
    Application::$app->session->destroy();
    $res->status(200)->json([
        "success" => true,
        "message" => "Logged out successfully"
    ]);
};