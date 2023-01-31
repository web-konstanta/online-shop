@extends('layouts.app')

@section('title')
    Связаться с нами
@endsection

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-11 mx-auto">
                    <h1 class="edica-page-title" data-aos="fade-up">Связаться с нами</h1>
                    <section class="edica-contact py-5 mb-5">
                        <div class="row justify-content-center">
                            <div class="col-md-8 contact-form-wrapper">
                                @if(session()->has('success'))
                                    <p class="alert alert-success text-center">{{ session('success') }}</p>
                                @else
                                    <form action="{{ route('contact.store') }}" method="post">
                                        @csrf
                                        <h5 data-aos="fade-up">Задайте нам вопрос</h5>
                                        <div class="row">
                                            <div class="form-group col-md-6" data-aos="fade-up">
                                                <label for="name">Ваше имя</label>
                                                <input type="text" class="form-control" id="name" name="user_name" placeholder="Введите имя">
                                                @error('user_name')
                                                <p class="text-danger">Введите имя не короче 2-х символов</p>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6" data-aos="fade-up">
                                                <label for="phone">Ваш номер телефона</label>
                                                <input type="text" class="form-control" id="phone" name="phone_number" placeholder="Введите номер телефона">
                                                @error('phone_number')
                                                <p class="text-danger">Введите номер телефона</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-12" data-aos="fade-up" data-aos-delay="200">
                                                <label for="message">Ваше сообщение</label>
                                                <textarea name="message" id="message" rows="9" class="form-control"></textarea>
                                                @error('message')
                                                <p class="text-danger">Введите сообщение</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-warning btn-lg" data-aos="fade-up" data-aos-delay="300">Отправить</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
