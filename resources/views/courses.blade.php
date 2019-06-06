@extends('app')

@section('head-content')
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap-theme.min.css') }}"/>
@endsection

@section('content')
    <div class="bread">
        <div class="container">
            <ul>
                <li><a href="{{ route('home') }}">Главная</a></li>
                <li>Курсы</li>
            </ul>
        </div>
    </div>

    @include('includes.modal-form')

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
                        <button type="submit" data-toggle="modal" data-target="#coursesModal" class="btn">Записаться</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('footer-content')
    <script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
@endsection
