<?php

use App\Enums\Http\Method;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;

/*
|---------------------------------------------------------------------------------------------------------------------
| API Routes
|---------------------------------------------------------------------------------------------------------------------
| The configuration file for this application contains the necessary information to map
| incoming requests to the corresponding controller method. This file typically defines
| the available routes for the application, specifying the HTTP method (e.g., GET, POST), the URL path, the name
| of the controller class and the name of the method that will handle the request.
| The purpose of this file is to define a set of rules that the application follows when
| it receives an incoming request.
| By mapping requests to specific controller methods, the configuration file ensures that the application always
| executes the appropriate code to handle the request.
*/

return [
    'api' => [
        'v1' => [
            'products' => [
                [Method::POST, '/', ProductController::class, 'store'],
                [Method::GET, '/', ProductController::class, 'index'],
            ],

            'categories' => [
                [Method::POST, '/', CategoryController::class, 'store'],
                [Method::GET, '/', CategoryController::class, 'index'],
            ],

            'orders' => [
                [Method::POST, '/', OrderController::class, 'store'],
                [Method::GET, '/', OrderController::class, 'index'],
            ],
        ]
    ]
];
