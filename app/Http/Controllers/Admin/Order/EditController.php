<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;

class EditController extends Controller
{
    public function __invoke(Order $order)
    {
        return view('admin.order.edit', compact('order'));
    }
}
