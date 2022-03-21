<?php

namespace app\controllers;

use app\core\Request;
use app\core\Response;

class Flight extends \app\core\Controller
{
    protected string $departure = '';
    protected string $destination = '';
    protected string $departure_date = '';
    protected string $arrival_date = '';

    public function getFlights(Request $req, Response $res)
    {
        $flights = $this->model->findMany([
            ...$req->query,
//            'select' => [
//                'id', 'arrival_city', 'arrival_country', 'depart_date', 'price', 'destination_img'
//            ]
        ]);
        $res->json(["flights" => $flights]);
    }

    public function getFlight(Request $req, Response $res)
    {
        $flight = $this->model->findUnique([
            "where" => [
                "id" => $req->params["id"]
            ]
        ]);

//        if (!$flight) $res->json(['success' => false, 'message' => "Flight not found!"]);
        if (!$flight) $res->status(404)->throw(404, "Page Not Found");

        $booking_model = new \app\models\Booking();
        $flight->available_seats = $flight->seats - $booking_model->count([
                'where' => [
                    'flight_id' => $flight->id
                ]
            ]);

        return $flight;

//        $res->json( ['success'=>true,'flight' => $flight]);
//        $res->view('flight', ['flight' => $flight]);
    }

    public function addFlight(array $data)
    {
        $this->model->create([
            "data" => $data
        ]);
    }
}