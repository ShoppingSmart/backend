<?php

namespace App\Enums\Http;

enum Method
{
    case GET;
    case POST;

    public static function from(string $method)
    {
        if ($method === "POST") {
            return Self::POST;
        }

        if ($method === "GET") {
            return Self::GET;
        }
    }
}
