@extends('layouts.app')

@section('title')
    Связаться с нами
@endsection

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-11 mx-auto">
                    <h1 class="edica-page-title" data-aos="fade-up">Войти на сайт</h1>
                    <section class="edica-contact py-5 mb-5">
                        <div class="row justify-content-center">
                            <div class="col-md-8 contact-form-wrapper">
                                @if(session()->has('success'))
                                    <p class="alert alert-success text-center">{{ session('success') }}</p>
                                @endif
                                    @if(session()->has('error'))
                                        <p class="alert alert-danger text-center">{{ session('error') }}</p>
                                    @endif
                                <form action="{{ route('user.auth') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6" data-aos="fade-up">
                                            <label for="phone">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Введите ваш email">
                                            @error('email')
                                            <p class="text-danger">Email должен быть заполнен или введен корректно</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6" data-aos="fade-up">
                                            <label for="name">Пароль</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Введите пароль">
                                            @error('password')
                                            <p class="text-danger">Введите пароль</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-warning btn-lg" data-aos="fade-up" data-aos-delay="300">Войти</button>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
