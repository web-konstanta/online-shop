@extends('admin.layouts.app')

@section('title', 'Управление ценами')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 144.4px">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="card col-6">
                <div class="card-header">
                    <h3 class="card-title">Управление ценами</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <form action="{{ route('admin.discounts.discount') }}" method="post">
                        @csrf
                        <input type="number" name="discount" placeholder="Введите процент">
                        <select class="form-select" name="discount_value" aria-label="Default select example">
                            <option value="1">Повысить</option>
                            <option value="0">Понизить</option>
                        </select>
                        <button class="btn btn-primary" type="submit">Применить</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.content-header -->
    </div>
@endsection
