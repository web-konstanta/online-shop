@extends('admin.layouts.app')

@section('title')
    Управление товарами
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 144.4px">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">{{ $product->name }}</h1>
                <p class="col-md-8 fs-4"><h3 class="d-inline">Стоимость:</h3> {{ $product->price }} грн</p>
                <p class="col-md-8 fs-4"><h3 class="d-inline">Краткое описание:</h3> {{ $product->short_description }}</p>
                <p class="col-md-8 fs-4"><h3 class="d-inline">Полное описание:</h3> {{ $product->description }}</p>
                <p class="col-md-8 fs-4"><h3 class="d-inline">Изображение товара:</h3></p>
                <img class="d-block" width="450" src="{{ url('storage/' . $product->image) }}">
                <button class="btn btn-primary btn-lg mt-3" type="button">
                    <a href="{{ route('admin.products.index') }}" class="text-white">Вернуться к списку товаров</a>
                </button>
            </div>
        </div>
        <!-- /.content-header -->
    </div>
@endsection
