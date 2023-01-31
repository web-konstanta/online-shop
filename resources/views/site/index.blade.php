@extends('layouts.app')

@section('title', 'Главная')

@section('content')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">Последние товары:</h1>
        <div class="d-flex justify-content-center">
            <form class="d-flex col-5" action="{{ route('site.search') }}" method="get">
                <input class="form-control me-2" type="search" name="search" placeholder="Поиск по наименованию товара" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Найти</button>
            </form>
        </div>
        <section class="featured-posts-section mt-5">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                        <a href="{{ route('site.product', $product->id) }}" class="text-dark text-decoration-none">
                            <section class="blog-post-featured-img aos-init aos-animate text-center" data-aos="fade-up" data-aos-delay="300">
                                <img src="{{ url('storage/' . $product->image) }}" alt="featured image" width="400">
                            </section>
                            @if($product->is_new === 1)
                                <p class="text-danger text-center">Товар-новинка</p>
                            @endif
                            <p class="blog-post-category text-center">{{ $product->name }}</p>
                            <p class="text-center">Стоимость: {{ $product->price }} грн</p>
                            <a href="#" class="blog-post-permalink">
                                <h6 class="blog-post-title text-center">{{ $product->short_description }}</h6>
                            </a>
                            <form action="{{ route('basket.store', $product->id) }}" method="post">
                                @csrf
                                <button class="btn btn-success col-sm-12 mt-5">В корзину</button>
                            </form>
                        </a>
                    </div>
                @endforeach
            </div>
            {{ $products->links() }}
        </section>
        <h1 class="edica-page-title" data-aos="fade-up">Рекомендуемые товары:</h1>
        <section class="featured-posts-section">
            <div class="row">
                @foreach($recommendedProducts as $product)
                    <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                        <a href="{{ route('site.product', $product->id) }}" class="text-dark text-decoration-none">
                            <section class="blog-post-featured-img aos-init aos-animate text-center" data-aos="fade-up" data-aos-delay="300">
                                <img src="{{ url('storage/' . $product->image) }}" alt="featured image" width="400">
                            </section>
                            @if($product->is_new === 1)
                                <p class="text-danger text-center">Товар-новинка</p>
                            @endif
                            <p class="blog-post-category text-center">{{ $product->name }}</p>
                            <p class="text-center">Стоимость: {{ $product->price }} грн</p>
                            <a href="#" class="blog-post-permalink">
                                <h6 class="blog-post-title text-center">{{ $product->short_description }}</h6>
                            </a>
                            <form action="{{ route('basket.store', $product->id) }}" method="post">
                                @csrf
                                <button class="btn btn-success col-sm-12 mt-5">В корзину</button>
                            </form>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    </div>

</main>
@endsection
