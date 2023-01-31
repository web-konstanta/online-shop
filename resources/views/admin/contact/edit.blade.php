@extends('admin.layouts.app')

@section('title')
    Редактирование сообщений
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 144.4px">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="card card-primary col-6">
                <div class="card-header">
                    <h3 class="card-title">Редактировать сообщение</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.contacts.update', $contact->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Имя пользователя</label>
                            <input type="text" class="form-control" name="user_name" value="{{ $contact->user_name }}">
                            @error('user_name')
                            <p class="text-danger">Имя пользоваьеля не должно быть пустым</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Номер телефона</label>
                            <input type="text" class="form-control" name="phone_number" value="0{{ $contact->phone_number }}">
                            @error('phone_number')
                            <p class="text-danger">Телефон не должен быть пустым</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Сообщение</label>
                            <textarea class="form-control" name="message">{{ $contact->message }}</textarea>
                            @error('message')
                            <p class="text-danger">Сообщение не должно быть пустым</p>
                            @enderror
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Статус сообщения</label>
                                <div class="form-group">
                                    <select name="status" class="form-control">
                                        <option {{ $contact->status == 0 ? 'selected' : '' }} value="0">Не отвеченное</option>
                                        <option {{ $contact->status == 1 ? 'selected' : '' }} value="1">Отвеченное</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.content-header -->
    </div>
@endsection
