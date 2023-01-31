<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class DestroyController extends Controller
{
    public function __invoke(Order $order)
    {
        $order->delete();
        DB::table('order_product')
            ->where('order_id', $order->id)
            ->delete();
        return redirect()->route('admin.orders.index');
    }
}
