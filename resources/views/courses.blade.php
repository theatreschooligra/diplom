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
            @foreach($courses as $course)
                <div class="courses_block">
                    <div class="courses_block-left">
                        <img src="{{ asset('img/'. $course->image) }}">
                    </div>
                    <div class="courses_block-right">
                        <h3>{{ $course->name }}</h3>
                        {!! $course->description !!}
                        <button type="submit" class="btn">Записаться</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection