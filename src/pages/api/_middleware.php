<?php

return function (\app\core\Request $req, \app\core\Response $res) {
    if ($req->method == "get") {
        if ($req->query["csrf_token"] !== \app\core\Application::$app->session->get("csrf_token")) {
            $res->status(400)->json([
                "success" => false,
                "message" => "Access denied!"
            ]);
        }
    } else {
        if ($req->body["csrf_token"] !== \app\core\Application::$app->session->get("csrf_token")) {
            $res->status(400)->json([
                "success" => false,
                "message" => "Access denied!"
            ]);
        }
    }
};
