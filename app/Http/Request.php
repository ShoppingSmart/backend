<?php

namespace App\Http;

use App\Enums\Http\Method;
use stdClass;

class Request
{
    protected Method $method;

    protected stdClass $data;

    public function __construct()
    {
        $this->data = new stdClass;
    }

    public static function create(...$args): Self
    {
        return new Self(...$args);
    }

    public function setMethod(Method $method): Self
    {
        $this->method = $method;

        return $this;
    }

    public function set(array $params): Self
    {
        foreach ($params as $key => $param) {
            $this->data->$key = $param;
        }

        return $this;
    }

    public function data(): stdClass
    {
        return $this->data;
    }

    public function isGet(): bool
    {
        return $this->method === Method::GET;
    }

    public function isPost(): bool
    {
        return $this->method === Method::POST;
    }
}
