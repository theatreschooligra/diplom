@extends('app')

@section('content')
    <!-- bread -->
    <div class="bread">
        <div class="container">
            <ul>
                <li><a href="{{ route('home') }}">Главная</a></li>
                <li>Контакты</li>
            </ul>
        </div>
    </div>

    <div class="contacts">
        <div class="container">
            <h1>Контакты</h1>
            <div class="contacts-top">
                <div class="contacts-left">
                    <ul>
                        <li>{{ $company->address }}</li>
                        <li><a href="tel:{{ str_replace(' ', '', $company->phone_number) }}">{{ $company->phone_number }}</a></li>
                        <li><a href="mailto:{{ $company->email }}">{{ $company->email }}</a></li>
                    </ul>
                </div>
                <div class="contacts-right">
                    <div id="map">
                        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ae46812f3379285d1757edeadcbe878267920e5d05434b204ed3b9d68060f05ef&amp;width=570&amp;height=400&amp;lang=ru_UA&amp;scroll=true"></script>
                    </div>
                </div>
            </div>
            <div class="connection">
                <h3>Хотите связаться с нами?</h3>
                <form>
                    <input type="text" placeholder="Ваше имя">
                    <input type="text" placeholder="Ваш e-mail или телефон">
                    <textarea placeholder="Ваше обращения"></textarea>
                    <input type="submit" class="btn">
                </form>
            </div>
        </div>
    </div>
@endsection