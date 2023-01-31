@extends('layouts.app')

@section('title')
    Связаться с нами
@endsection

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-11 mx-auto">
                    <h1 class="edica-page-title" data-aos="fade-up">Зарегистрируйтесь на сайте</h1>
                    <section class="edica-contact py-5 mb-5">
                        <div class="row justify-content-center">
                            <div class="col-md-8 contact-form-wrapper">
                                @if(session()->has('error'))
                                    <p class="alert alert-danger text-center">{{ session('error') }}</p>
                                @endif
                                <form action="{{ route('user.store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6" data-aos="fade-up">
                                            <label for="name">Логин/Имя</label>
                                            <input type="text" class="form-control" id="login" name="login" placeholder="Введите логин/имя">
                                            @error('login')
                                            <p class="text-danger">Введите логин не меньше 2-х символов</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6" data-aos="fade-up">
                                            <label for="phone">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Введите ваш email">
                                            @error('email')
                                            <p class="text-danger">Email введен не корректно или он уже используется на сайте.</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6" data-aos="fade-up">
                                            <label for="name">Пароль</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Введите пароль">
                                            @error('password')
                                            <p class="text-danger">Введите пароль</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6" data-aos="fade-up">
                                            <label for="phone">Подтвердите пароль</label>
                                            <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Подтвердите пароль">
                                            @error('password_confirm')
                                            <p class="text-danger">Подтвердите пароль</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-warning btn-lg" data-aos="fade-up" data-aos-delay="300">Зарегистрироваться</button>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
