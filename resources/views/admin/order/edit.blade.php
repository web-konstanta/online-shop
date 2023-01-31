@extends('admin.layouts.app')

@section('title', 'Обновление товара')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 144.4px">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="card card-primary col-6">
                <div class="card-header">
                    <h3 class="card-title">Редактировать заказ</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.orders.update', $order->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Имя покупателя</label>
                            <input type="text" class="form-control" name="user_name" value="{{ $order->user_name }}">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Телефон покупателя</label>
                            <input type="tel" class="form-control" name="phone_number" value="{{ $order->phone_number }}">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Комментарий к заказу</label>
                            <input type="text" class="form-control" name="message" value="{{ $order->message }}">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Статус заказа</label>
                            <div class="form-group">
                                <select name="status" class="form-control">
                                    <option {{ $order->status == 1 ? 'selected' : ''}} value="1">Новый заказ</option>
                                    <option {{ $order->status == 2 ? 'selected' : ''}} value="2">В обработке</option>
                                    <option {{ $order->status == 3 ? 'selected' : ''}} value="3">Доставляется</option>
                                    <option {{ $order->status == 4 ? 'selected' : ''}} value="4">Закрыт</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.content-header -->
    </div>
@endsection
