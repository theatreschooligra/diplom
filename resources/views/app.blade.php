<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}"/>
    @yield('head-content')
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">

    <title>Igra</title>
</head>
<body>
<!-- header -->
<header class="fixed">
    <div class="container">
        <a href="#" class="nav--btn">
            <span></span>
            <span></span>
            <span></span>
        </a>
        <a href="#" class="phone--btn"></a>
        <a href="/" class="logo">
            <img src="{{ asset('imgs/logo_white.png') }}" class="logo-img">
        </a>
        <div class="menu">
            <ul>
                <li><a href="{{ route('home') }}">Главная</a></li>
                <li><a href="{{ route('about') }}">О нас</a></li>
                <li><a href="{{ route('courses') }}">Курсы</a></li>
                <li><a href="{{ route('team') }}">Команда</a></li>
                <li><a href="{{ route('repertoire') }}">Репертуары</a></li>
                <li><a href="{{ route('blogs') }}">Блог</a></li>
                <li><a href="{{ route('contact') }}">Контакты</a></li>
            </ul>
        </div>
        <div class="phone">
            <a href="tel:{{ str_replace(' ', '', $company->phone_number) }}" class="phone-number">{{ $company->phone_number }}</a>
        </div>
    </div>
</header>

<section>
    @yield('content')
</section>

<footer>
    <div class="container">
        <div class="footer-top">
            <div class="footer-top-col">
                <a href="#" class="logo">
                    <img src="{{ asset('imgs/logo_white.png') }}" class="logo-img">
                </a>
                <br>
                <p>Актерская школа</p>
                <ul class="social">
                    <li><a href="{{ $company->url_to_youtube }}" target="_blank"><i class="fa fa-vk" aria-hidden="true"></i></a></li>
                    <li><a href="{{ $company->url_to_facebook }}" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
                    <li><a href="{{ $company->url_to_instagram }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                </ul>

            </div>
            <div class="footer-top-col courses">
                <h4>Курсы</h4>
                <ul>
                    <li><a href="#">Коммуникативный курс</a></li>
                    <li><a href="#">Актерский курс</a></li>
                    <li><a href="#">Специальный курс</a></li>
                </ul>
            </div>
            <div class="footer-top-col navigation">
                <h4>Навигация</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Главная</a></li>
                    <li><a href="{{ route('about') }}">О нас</a></li>
                    <li><a href="{{ route('courses') }}">Курсы</a></li>
                    <li><a href="{{ route('contact') }}">Контакты</a></li>
                </ul>
            </div>
            <div class="footer-top-col">
                <h4>Контакты</h4>
                <p>г. Алматы, {{ $company->address }}</p>
                <ul>
                    <li><a href="tel:{{ str_replace(' ', '', $company->phone_number) }}">Телефон: {{ $company->phone_number }}</a></li>
                    <li><a href="mailto:{{ $company->email }}">Почта: {{ $company->email }}</a></li>
                </ul>

            </div>
        </div>

        <div class="footer-bottom">
            <p>Copyright © 2018 ТОО marabu.kz All Rights Reserved  </p>
            <a href="#" target="_blank">Создание сайта</a>
        </div>
    </div>
</footer>

<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.inputmask.bundle.js') }}"></script>
@yield('footer-content')
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

</body>
</html>