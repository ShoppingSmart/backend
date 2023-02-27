<?php

namespace App\Routing;

use App\Enums\Http\Method;
use App\Http\Controllers\Controller;

class Route
{
    public function __construct(
        public readonly Controller $controller,
        public readonly string $route,
        public readonly Method $method,
        public readonly string $function
    ) {
    }
}
