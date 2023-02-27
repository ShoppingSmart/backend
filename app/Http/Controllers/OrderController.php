<?php

namespace App\Http\Controllers;

use App\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Request
     */
    public function index(Request $request): array
    {
        return Order::newModelInstance()->all();
    }
}
