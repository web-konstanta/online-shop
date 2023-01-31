<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $user = User::where('id', session('user'))->first();
        $cartsIds = Cart::select('product_id')->where('user_id', session('user'))->get();
        $cartsQuantity = Cart::select('quantity')->where('user_id', session('user'))->get();
        foreach ($cartsIds as $id) {
            $cartsProductsIds[] = $id->product_id;
        }
        foreach ($cartsQuantity as $quantity) {
            $cartsProductsQuantity[] = $quantity->quantity;
        }
        $order = Order::create([
            'user_name' => $user->login,
            'phone_number' => $data['phone_number'],
            'message' => $data['message'],
            'total_price' => Cart::getTotalProductsPrice(),
            'quantity' => json_encode($cartsProductsQuantity),
        ]);
        $order->products()->attach($cartsProductsIds);
        Cart::where('user_id', session('user'))->delete();
        return redirect('/cabinet')->with('success', 'Заказ успешно оформлен');
    }
}
