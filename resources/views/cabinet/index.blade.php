@extends('layouts.app')

@section('title', 'Личный кабинет')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                @if(session()->has('success'))
                    <p class="text-center alert alert-success">{{ session('success') }}</p>
                @else
                    <h1 class="display-5 fw-bold">Приветствую, {{ $user->login }}!</h1>
                    @if($user->role === 'admin')
                        <h5 class="mt-2">
                            <a href="{{ route('admin.index') }}" class="col-md-8 fs-4 text-decoration-none">Панель администратора</a>
                        </h5>
                    @endif
                    <h5 class="mt-2">
                        <a href="#" class="col-md-8 fs-4 text-decoration-none">Редактировать данные</a>
                    </h5>
                    <h5 class="mt-2">
                        <a href="#" class="col-md-8 fs-4 text-decoration-none">Список покупок</a>
                    </h5>
                @endif
            </div>
        </div>
    </div>
@endsection
