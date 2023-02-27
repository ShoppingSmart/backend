<?php

namespace App\Http\Controllers;

use App\Http\Request;
use App\Models\Order;
use App\Models\OrderProduct;
use Exception;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Request
     */
    public function index(Request $request): array
    {
        $orders = Order::newModelInstance()->all();

        foreach ($orders as $key => $order) {
            $orders[$key]['order_products'] = OrderProduct::newModelInstance()->where('order_id', $order['id']);
        }

        return $orders;
    }

    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Request
     */
    public function store(Request $request): array
    {
        $payload = $request->all();

        if (empty((array) $payload)) {
            throw new Exception('Please add at least one item to your cart');
        }

        $orderId = Order::newModelInstance()->create([
            'created_at' => date("Y/m/d H:i:s")
        ]);

        foreach ($payload as $orderItem) {
            OrderProduct::newModelInstance()->create([
                'product_id' => $orderItem['id'],
                'quantity' => $orderItem['quantity'],
                'order_id' => $orderId
            ]);
        }

        return [
            'id' => $orderId
        ];
    }
}
