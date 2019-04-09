@extends('app')

@section('content')
    <div class="bread">
        <div class="container">
            <ul>
                <li><a href="{{ route('home') }}">Главная</a></li>
                <li>Курсы</li>
            </ul>
        </div>
    </div>

    <div class="courses-page">
        <div class="container">
            <h1>Курсы</h1>
            <div class="courses_block">
                <div class="courses_block-left">
                    <img src="{{ asset('imgs/courses-1.png') }}">
                </div>
                <div class="courses_block-right">
                    <h3>Коммуникативный курс</h3>
                    <p>Интенсивная краткосрочная программа разговорного английского. Основные цели обучения - развить навыки общения на английском языке, увеличить словарный запас и преодолеть языковой барьер в краткие сроки.</p>
                    <button type="submit" class="btn">Записаться</button>
                </div>
            </div>
            <div class="courses_block">
                <div class="courses_block-left">
                    <img src="{{ asset('imgs/courses-2.png') }}">
                </div>
                <div class="courses_block-right">
                    <h3>Коммуникативный курс</h3>
                    <p>Профессия «актер» для многих любителей театра и кино навсегда останется светлой мечтой, на воплощение которой не приходится рассчитывать даже самым отъявленным оптимистам. На родине Станиславского, в России – стране, подарившей миру одну из сильнейших театральных школ – любовь к театру можно смело считать</p>
                    <button type="submit" class="btn">Записаться</button>
                </div>
            </div>
            <div class="courses_block">
                <div class="courses_block-left">
                    <img src="{{ asset('imgs/courses-3.png') }}">
                </div>
                <div class="courses_block-right">
                    <h3>Коммуникативный курс</h3>
                    <p>Профессия «актер» для многих любителей театра и кино навсегда останется светлой мечтой, на воплощение которой не приходится рассчитывать даже самым отъявленным оптимистам. На родине Станиславского, в России – стране, подарившей миру одну из сильнейших театральных школ </p>
                    <button type="submit" class="btn">Записаться</button>
                </div>
            </div>
        </div>
    </div>
@endsection