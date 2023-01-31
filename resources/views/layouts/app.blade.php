<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/loader.js') }}"></script>
</head>
<body>
<div class="edica-loader"></div>
<header class="edica-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{ route('site.index') }}"><img src="{{ asset('assets/images/logo.svg') }}" alt="Edica"></a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#edicaMainNav" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="edicaMainNav">
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('site.index') }}">Главная</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href=# id="blogDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Категории товаров</a>
                        <div class="dropdown-menu" aria-labelledby="blogDropdown">
                            @foreach(\App\Models\Category::all() as $category)
                                <a class="dropdown-item" href="{{ route('category.index', $category->id) }}">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('site.contact') }}">Связаться с нами</a>
                    </li>
                </ul>
                <ul class="navbar-nav mt-2 mt-lg-0">
                    @if(\App\Models\User::isGuest())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('basket.index') }}">Корзина</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cabinet.index') }}">Кабинет</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.logout') }}">Выйти из сайта</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('user.login') }}>Авторизация</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('user.register') }}>Регистрация</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>
@yield('content')
<footer class="edica-footer mt-5" data-aos="fade-up">
    <div class="container">
        <div class="row footer-widget-area justify-content-between">
            <div class="col-md-3">
                <a href="#" class="footer-brand-wrapper">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="edica logo">
                </a>
                <p class="contact-details">example@gmail.com</p>
                <p class="contact-details">+380 68 17 98 046</p>
                <nav class="footer-social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-behance"></i></a>
                    <a href="#"><i class="fab fa-dribbble"></i></a>
                </nav>
            </div>
            <div class="col-md-3">
                <nav class="footer-nav">
                    <a href="#" class="nav-link">Company</a>
                    <a href="#" class="nav-link">Android App</a>
                    <a href="#" class="nav-link">ios App</a>
                    <a href="#" class="nav-link">Blog</a>
                    <a href="#" class="nav-link">Partners</a>
                    <a href="#" class="nav-link">Careers</a>
                </nav>
            </div>
        </div>
    </div>
</footer>
<script src="{{ asset('assets/vendors/popper.js/popper.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/aos/aos.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
    AOS.init({
        duration: 1000
    });
</script>
</body>

</html>
