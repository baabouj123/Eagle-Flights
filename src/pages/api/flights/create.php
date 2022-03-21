<?php
//return [\app\controllers\Booking::class, "book"];

return function (\app\core\Request $req, \app\core\Response $res) {
    if ($req->method !== "post") $res->status("405")->json([
        'success' => false,
        'message' => 'Method Not Allowed!'
    ]);
    if (!\app\core\Application::$app->user->isAdmin()) $res->status("401")->json([
        'success' => false,
        'message' => 'Unauthorized!'
    ]);
//    $res->json($req->body);

    $flights = new \app\controllers\Flight();
//    $bookings = new \app\controllers\Booking();

//    $flight_id = $req->body["flight_id"];
//    $user_id = \app\core\Application::$app->user->id;

    $errors = $flights->validate($req->body, [
        'depart_city' => 'required',
        'arrival_country' => 'required',
        'arrival_city' => 'required',
        'depart_date' => 'required',
        'arrival_date' => 'required',
        'price' => 'required',
        'seats' => 'required',
        'destination_img' => 'required',
    ]);

    if ($errors) {
        $res->status("400")->json([
            'success' => false,
            'errors' => $errors
        ]);
    }

    $flights->addFlight([
        'depart_city' => $req->body["depart_city"],
        'arrival_country' =>  $req->body["arrival_country"],
        'arrival_city' =>  $req->body["arrival_city"],
        'depart_date' =>  $req->body["depart_date"],
        'arrival_date' =>  $req->body["arrival_date"],
        'price' =>  $req->body["price"],
        'seats' =>  $req->body["seats"],
        'destination_img' =>  $req->body["destination_img"],
        ]);

    $res->status(201)->json([
        "success" => true,
        'message' => 'Flight added successfully!'
    ]);
};
