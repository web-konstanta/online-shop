@extends('admin.layouts.app')

@section('title')
    Управление категориями
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 144.4px">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="card card-primary col-6">
                <div class="card-header">
                    <h3 class="card-title">Добавить категорию</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.categories.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название категории</label>
                            <input type="text" class="form-control" name="name">
                            @error('name')
                            <p class="text-danger">Данное поле должно быть заполненым</p>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.content-header -->
    </div>
@endsection
