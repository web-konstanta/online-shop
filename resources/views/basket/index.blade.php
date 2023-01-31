@extends('layouts.app')

@section('title', 'Корзина товаров')

@section('content')
    <div class="container mt-5 mb-5">
        <h1 class="text-center mb-2">Корзина</h1>
        <p class="text-center mb-5">Оформление заказа</p>
        @if(session()->has('error'))
            <p class="text-center alert alert-danger">{{ session('error') }}</p>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Количество</th>
                <th scope="col">Цена</th>
                <th scope="col">Стоимость</th>
            </tr>
            </thead>
            <tbody>
            @foreach($productsInCart as $product)
                <tr>
                    <th scope="row">{{ $product->name }}</th>
                    <td>
                        <div class="d-flex align-items-center">
                            <span>({{ $product->quantity }})</span>
                            <div class="d-flex">
                                <form action="{{ route('basket.remove', $product->product_id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">-</button>
                                </form>
                                <form action="{{ route('basket.store', $product->product_id) }}" method="post">
                                    @csrf
                                    <button class="btn btn-success">+</button>
                                </form>
                            </div>
                        </div>
                    </td>
                    <td>{{ $product->price }} грн</td>
                    <td>{{ $product->total_price }} грн</td>
                </tr>
            @endforeach
            <tr>
                <th scope="row">Общая стоимость:</th>
                <td></td>
                <td></td>
                <td>{{ \App\Models\Cart::getTotalProductsPrice() }} грн</td>
            </tr>
            <tr>
                <th scope="row">
                    <a href="{{ route('order.index') }}" class="btn btn-primary">Оформить заказ</a>
                </th>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
