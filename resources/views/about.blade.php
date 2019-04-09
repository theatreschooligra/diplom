@extends('app')

@section('content')
    <div class="bread">
        <div class="container">
            <ul>
                <li><a href="{{ route('home') }}">Главная</a></li>
                <li>О нас</li>
            </ul>
        </div>
    </div>

    <div class="about-page">
        <h1>О нас</h1>
        <div class="about-top">
            <div class="container">
                <div class="video-block"><iframe
                            src="https://www.youtube.com/embed/D9QoJ19wq3I">
                    </iframe></div>
                <div class="video-block"><iframe
                            src="https://www.youtube.com/embed/RrFwSpHGKdQ">
                    </iframe></div>
            </div>
        </div>
        <div class="about-bottom">
            <div class="container">
                {!! $company->about !!}
            </div>
        </div>
    </div>
@endsection