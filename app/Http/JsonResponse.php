<?php

namespace App\Http;

use RuntimeException;

class JsonResponse
{
    public static function create(array $data, int $statusCode = 200): void
    {
        $json = json_encode($data);

        if ($json === false) {
            throw new RuntimeException('Error encoding JSON data');
        }

        $contentLength = strlen($json);

        http_response_code($statusCode);

        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With");

        echo $json;

        exit();
    }
}
