<?php
//return [\app\controllers\Booking::class, "book"];

return function (\app\core\Request $req, \app\core\Response $res) {
    if ($req->method !== "post") $res->status("405")->json([
        'success' => false,
        'message' => 'Method Not Allowed!'
    ]);

    $flights = new \app\controllers\Flight();
    $bookings = new \app\controllers\Booking();

    $flight_id = $req->body["flight_id"];
    $user_id = \app\core\Application::$app->user->id;

    $errors = $flights->validate([
        "id" => $flight_id
    ], [
        'id' => 'required|exist'
    ]);

    if ($errors) {
        $res->status("404")->json([
            'success' => false,
            'message' => $errors['id']
        ]);
    }

    $alreadyBooked = $bookings->validate([
        "flight_id" => $flight_id,
        "user_id" => $user_id
    ], [
        'flight_id' => 'required|exist',
        'user_id' => 'required|exist'
    ]);

    if (!$alreadyBooked){
        $res->status("200")->json([
            'success' => false,
            'message' => "flight already booked!"
        ]);
    }

    $bookings->model->create([
        "data" => [
            "user_id" => $user_id,
            "flight_id" => $flight_id
        ]
    ]);

    $res->status(201)->json([
        'status' => 'success',
        'message' => 'Flight booked successfully!'
    ]);
};
