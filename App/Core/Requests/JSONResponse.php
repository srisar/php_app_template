<?php


namespace App\Core\Requests;


class JSONResponse
{

    private array $payload;
    private int $statusCode;


    public function __construct($data, $statusCode = 200)
    {
        $this->payload = $data;
        $this->statusCode = $statusCode;
    }

    public function response()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, Origin, Methods");

        http_response_code($this->statusCode);
        echo json_encode($this->payload);
    }

    public static function invalidResponse($payload = ["data" => "Invalid request."])
    {
        $response = new JSONResponse($payload, 400);
        $response->response();
    }

}