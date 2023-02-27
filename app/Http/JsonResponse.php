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
        header("Content-Length: {$contentLength}");
        header("Access-Control-Allow-Origin: *");

        echo $json;

        exit();
    }
}
