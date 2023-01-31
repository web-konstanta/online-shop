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
                    <h3 class="card-title">Добавить товар</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название товара</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @error('name')
                            <p class="text-danger">Имя должно быть заполненым</p>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Стоимость товара</label>
                            <input type="tel" class="form-control" name="price" value=""{{ old('price') }}">
                            @error('price')
                            <p class="text-danger">Стоимость должна быть заполненым</p>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Краткое описание товара</label>
                            <textarea class="form-control" name="short_description">{{ old('short_description') }}</textarea>
                            @error('short_description')
                            <p class="text-danger">Краткое описание должно быть заполненым</p>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Полное описание товара</label>
                            <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                            @error('description')
                            <p class="text-danger">Описание должно быть заполненым</p>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Добавить изображение товара</label>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="exampleInputFile" value=""{{ old('image') }}">
                                <label class="custom-file-label" for="exampleInputFile">Добавьте файл</label>
                            </div>
                            @error('image')
                            <p class="text-danger">Изображение должно быть заполненым</p>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Категория товара</label>
                            <div class="form-group">
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Рекомендуемый товар</label>
                            <div class="form-group">
                                <select name="is_recommended" class="form-control">
                                    <option value="0">-</option>
                                    <option value="1">Рекомендуемый</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Товар-новинка</label>
                            <div class="form-group">
                                <select name="is_new" class="form-control">
                                    <option value="0">-</option>
                                    <option value="1">Новинка</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Наличие на складе</label>
                            <div class="form-group">
                                <select name="availability" class="form-control">
                                    <option value="1">Присутствует</option>
                                    <option value="0">Временно отсутствует</option>
                                </select>
                            </div>
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
