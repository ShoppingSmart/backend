<?php

namespace App\Http;

use App\Enums\Http\Method;

class Server
{
    public static function pathInfo(): string
    {
        return ltrim($_SERVER["PATH_INFO"], '/');
    }

    public static function method(): Method
    {
        return Method::from($_SERVER["REQUEST_METHOD"]);
    }
}
