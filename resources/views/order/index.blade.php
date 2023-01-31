@extends('layouts.app')

@section('title', 'Оформление заказа')

@section('content')
    <main>
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-11 mx-auto">
                    @if(session()->has('success'))
                        <p class="alert alert-success text-center">{{ session('success') }}</p>
                    @else
                        <p class="text-center">Выбрано товаров: {{ $productsQuantity }}, на сумму: {{ $productsPrice }} грн.</p>
                        <p class="text-center">Для оформления заказа заполните форму.</p>
                        <section class="edica-contact py-5 mb-5">
                            <div class="row justify-content-center">
                                <div class="col-md-8 contact-form-wrapper">
                                    <form action="{{ route('order.store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-6" data-aos="fade-up">
                                                <label for="name">Номер телефона</label>
                                                <input type="tel" class="form-control" name="phone_number" placeholder="Введите номер телефона">
                                                @error('phone_number')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6" data-aos="fade-up">
                                                <label for="phone">Комментарий к заказу</label>
                                                <input type="text" class="form-control" name="message" placeholder="Введите сообщение">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-warning btn-lg" data-aos="fade-up" data-aos-delay="300">Оформить</button>
                                    </form>
                                </div>
                            </div>
                        </section>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
