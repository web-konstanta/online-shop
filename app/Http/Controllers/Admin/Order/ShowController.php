<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;

class ShowController extends Controller
{
    public function __invoke(Order $order)
    {
        $productsQuantity = json_decode($order->quantity, true);
        return view('admin.order.show', compact('order', 'productsQuantity'));
    }
}
