@extends('admin.layouts.app')

@section('title', 'Просмотр заказа')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 144.4px">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Номер заказа: {{ $order->id }}</h1>
                <h1 class="display-5 fw-bold mt-3">Имя клиента: {{ $order->user_name }}</h1>
                <h1 class="display-5 fw-bold mt-3">Телефон клиента: {{ $order->phone_number }}</h1>
                <h1 class="display-5 fw-bold mt-3">Комментарий клиента: {{ $order->message }}</h1>
                <h1 class="display-5 fw-bold mt-3">Статус заказа: {{ \App\Models\Order::getStatusText($order->status) }}</h1>
                <h1 class="display-5 fw-bold mt-3">Дата заказа: {{ $order->created_at }}</h1>
                <h1 class="display-5 fw-bold mt-3">Выбранные товары:</h1>
                <div class="d-flex">
                    <table class="table col-2 mt-5">
                        <thead>
                        <tr>
                            <th scope="col">Название товара</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->products as $cart)
                            <tr>
                                <td>{{ $cart->name }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <table class="table col-2 mt-5">
                        <thead>
                        <tr>
                            <th scope="col">Количество</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productsQuantity as $quantity)
                            <tr>
                                <td>{{ $quantity }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <h5>Общая стоимость покупки: {{ $order->total_price }} грн</h5>
                <button class="btn btn-primary btn-lg mt-3" type="button">
                    <a href="{{ route('admin.orders.index') }}" class="text-white">Вернуться к списку заказов</a>
                </button>
            </div>
        </div>
        <!-- /.content-header -->
    </div>
@endsection
