@extends('admin.layouts.app')

@section('title')
    Обновление товара
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 144.4px">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="card card-primary col-6">
                <div class="card-header">
                    <h3 class="card-title">Редактировать товар</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название товара</label>
                            <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                            @error('name')
                            <p class="text-danger">Имя должно быть заполненым</p>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Стоимость товара</label>
                            <input type="tel" class="form-control" name="price" value="{{ $product->price }}">
                            @error('price')
                            <p class="text-danger">Стоимость должна быть заполненым</p>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Краткое описание товара</label>
                            <textarea class="form-control" name="short_description">{{ $product->short_description }}</textarea>
                            @error('short_description')
                            <p class="text-danger">Краткое описание должно быть заполненым</p>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Полное описание товара</label>
                            <textarea class="form-control" name="description">{{ $product->description }}</textarea>
                            @error('description')
                            <p class="text-danger">Описание должно быть заполненым</p>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Изменить изображение товара</label>
                            <img src="{{ url('storage/' . $product->image) }}" width="300">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" value="{{ $product->image }}">
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
                                        <option
                                            {{ $product->category_id === $category->id ? 'selected' : '' }}
                                            value="{{ $category->id }}">{{ $category->name }}</option>
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
                                    <option {{ $product->is_recommended == 0 ? 'selected' : '' }} value="0">-</option>
                                    <option {{ $product->is_recommended == 1 ? 'selected' : ''}} value="1">Рекомендуемый</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Товар-новинка</label>
                            <div class="form-group">
                                <select name="is_new" class="form-control">
                                    <option {{ $product->is_new == 0 ? 'selected' : '' }} value="0">-</option>
                                    <option {{ $product->is_new == 1 ? 'selected' : '' }} value="1">Новинка</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Наличие на складе</label>
                            <div class="form-group">
                                <select name="availability" class="form-control">
                                    <option {{ $product->availability == 1 ? 'selected' : '' }} value="1">Присутствует</option>
                                    <option {{ $product->availability == 0 ? 'selected' : '' }} value="0">Временно отсутствует</option>
                                </select>
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
