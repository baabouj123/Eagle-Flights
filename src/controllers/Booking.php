<?php

namespace app\controllers;

use app\core\Application;
use app\core\Request;
use app\core\Response;

class Booking extends \app\core\Controller
{
    public function book(Request $req, Response $res)
    {
        if ($req->method !== "post") $res->status("405")->json([
            'success' => false,
            'message' => 'Method Not Allowed!'
        ]);

        $this->model->create([
            "data" => [
                "user_id" => Application::$app->user->id,
                "flight_id" => $req->body["flight_id"]
            ]
        ]);
        $res->status(201)->json([
            'status' => 'success',
            'message' => 'Flight booked successfully!'
        ]);
//        $res->redirect("/bookings");
    }

    public function cancelBooking(Request $req, Response $res)
    {
        if ($req->method !== "delete") $res->status("405")->json([
            'success' => false,
            'message' => 'Method Not Allowed!'
        ]);
        $this->model->delete([
            "where" => [
                "id" => $req->body['id']
            ]
        ]);
        $res->json([
            'success' => true,
            'message' => 'Booking canceled successfully!'
        ]);
//        $res->redirect("/bookings");
    }

    public function getUserBookings(Request $req, Response $res): bool|array
    {
        return $this->model->findMany([
            "where" => [
                "user_id" => Application::$app->user->id,
            ],
            "include" => [
                "flights" => true
            ],
            "select" => [
                'bookings.id', 'arrival_city', 'arrival_country', 'depart_date', 'price', 'destination_img'
            ]
        ]);
//        $res->json([
//            "bookings" => $bookings,
//            "count" => count($bookings)
//        ]);
//        $res->view("bookings", ["bookings" => $bookings]);
    }

    public function getSingleBooking(Request $req, Response $res)
    {
        $booking = $this->model->findUnique([
            "where" => [
                "id" => $req->params["id"],
                "user_id" => Application::$app->user->id,
            ],
            "include" => [
                "flights" => true
            ],
            "select" => [
                'bookings.id', 'flight_id', 'depart_city', 'depart_country', 'arrival_city', 'arrival_country', 'depart_date', 'arrival_date', 'price', 'destination_img', 'seats'
            ]
        ]);
        if (!$booking) $res->status(404)->throw(404, "Page Not Found");

        $booking->available_seats = $booking->seats - $this->model->count([
                'where' => [
                    'flight_id' => $booking->flight_id
                ]
            ]);
//                $res->json($booking);
        return $booking;
//        $res->view('booking', ['booking' => $booking]);
    }
}