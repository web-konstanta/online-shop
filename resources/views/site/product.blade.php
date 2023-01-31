@extends('layouts.app')

@section('title')
    Страничка товара
@endsection

@section('content')
    <div class="container col-4">
        <h1 class="edica-page-title aos-init aos-animate" data-aos="fade-up">{{ $product->name }}</h1>
        <section class="blog-post-featured-img aos-init aos-animate text-center" data-aos="fade-up" data-aos-delay="300">
            <img src="{{ url('storage/' . $product->image) }}" alt="featured image" width="400">
        </section>
        <section class="post-content mt-5">
            @if($product->is_new === 1)
                <p class="text-danger text-center">Товар-новинка</p>
            @endif
            <div class="row">
                <div class="col-lg-9 mx-auto aos-init" data-aos="fade-up">
                    <p>{{ $product->description }}</p>
                </div>
            </div>
            <form action="{{ route('basket.store', $product->id) }}" method="post">
                @csrf
                <button class="btn btn-success col-sm-12 mt-5">В корзину</button>
            </form>
        </section>
    </div>
@endsection
