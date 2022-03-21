<?php
return function (\app\core\Request $req, \app\core\Response $res) {

    if ($req->method != "post" || $req->method != "delete") {
        $res->status(405)->json([
            "success" => false,
            "message" => "Method Not Allowed"
        ]);
    }

    $controller = new \app\controllers\Booking();

    if ($req->method != "post") {
        $errors = $this->validate($req->body, [
            'id' => 'required|exist'
        ]);
        if ($errors) {
            $res->json(["success" => false, 'errors' => $errors]);
        }
        $res->status(201)->json(["success" => true, "message" => "success"]);
    }
};