<?php
return function (\app\core\Request $req, \app\core\Response $res) {
    if ($req->method == "delete") {
        $model = new \app\models\Flight();
        if ($model->delete([
            "where" => [
                "id" => $req->params["id"]
            ]
        ])) {
            $res->json([
                "success" => true,
                "message" => "Flight deleted successfully!"
            ]);
        } else {
            $res->json([
                "success" => false,
                "message" => "Something went wrong!"
            ]);
        }
    }
    if ($req->method == "put") {
        $res->json([
            "success" => true,
            "message" => "Flight updated successfully!"
        ]);
    }
    if ($req->method == "get") {
        $model = new \app\models\Flight();
        $res->json([
            "success" => true,
            "flight" => $model->findUnique([
                "where" => [
                    "id" => $req->params["id"]
                ]
            ])
        ]);
    }
    $res->status(405)->json([
        "success" => false,
        "message" => "Method Not Allowed!"
    ]);
};
//return [\app\controllers\Flight::class,"getFlight"];
