@extends('app')

@section('head-content')
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap-theme.min.css') }}"/>
@endsection

@section('content')
    <div class="slider">
        <div>
            <img src="{{ asset('imgs/slider1.jpg') }}">
            <div class="slider--text">
                <h3>Актерская школа "Игра"</h3>
                <p>Познакомьтесь с преподавателями и методикой школы "Игра"</p>
                <div class="slider-bottom">
                    <button class="btn" data-toggle="modal" data-target="#coursesModal">Записаться</button>
                    <button class="btn">Написать whatsapp</button>
                </div>
            </div>
        </div>
        <div>
            <img src="{{ asset('imgs/slider2.jpg') }}">
            <div class="slider--text">
                <h3>Актерская школа "Игра"</h3>
                <p>Познакомьтесь с преподавателями и методикой школы "Игра"</p>
                <div class="slider-bottom">
                    <button class="btn" data-toggle="modal" data-target="#coursesModal">Записаться</button>
                    <button class="btn">Написать whatsapp</button>
                </div>
            </div>
        </div>
        <div>
            <img src="{{ asset('imgs/slider3.jpg') }}">
            <div class="slider--text">
                <h3>Актерская школа "Игра"</h3>
                <p>Познакомьтесь с преподавателями и методикой школы "Игра"</p>
                <div class="slider-bottom">
                    <button class="btn" data-toggle="modal" data-target="#coursesModal">Записаться</button>
                    <button class="btn">Написать whatsapp</button>
                </div>
            </div>
        </div>
    </div>

    <!-- advantages -->
    <div class="advantages">
        <div class="container">
            <h2>Преимущества</h2>
            <div class="advantages-row">
                <div class="advantages_block">
                    <div class="advantages_block-top">
                        <img src="{{ asset('imgs/masks.png') }}">
                    </div>
                    <h3>Преподаватели</h3>
                    <p>Все преподаватели действующие актеры театра.</p>
                </div>
                <div class="advantages_block">
                    <div class="advantages_block-top">
                        <img src="{{ asset('imgs/location.png') }}">
                    </div>
                    <h3>Удобное расположение</h3>
                    <p>Мы находимся по адресу проспект Абая 10а, уг.пр. Назарбаева.</p>
                </div>
                <div class="advantages_block">
                    <div class="advantages_block-top">
                        <img src="{{ asset('imgs/rising.png') }}">
                    </div>
                    <h3>Экзамены</h3>
                    <p>Каждое 8-е занятие - открытый урок на сцене театра "Игра".</p>
                </div>
            </div>
        </div>

    </div>

    @if (count($repertoire) > 0)
        <!-- spectacles -->
        <div class="spectacles">
            <div class="container">
                <h2>Ближайшие спектакли</h2>
                <div class="spectacles-slider">
                    @foreach($repertoire as $row)
                        <div>
                            <a href="/repertoire#repertoire-{{ $row->id }}" class="spectacles-block">
                                <div class="spectacles-img"><img src="{{ asset('img/'. $row->image) }}">
                                    <div class="spectacles-date">
                                        <span>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->time)->format('d') }}</span>
                                        {{ config('month.'. \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->time)->format('m')) }}
                                    </div>
                                </div>

                                <div class="spectacles-text">
                                    <h4>{{ $row->name }}</h4>
                                    <p><span>Время:</span> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->time)->format('H:i') }}</p>
                                    <button class="btn">Посмотреть</button>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- courses -->
    <div class="courses">
        <div class="container">
            <h2>Наши курсы</h2>
            <div class="courses-items">
                <a href="#" class="courses_block">
                    <ul class="star">
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <div class="course_block--text">
                        <h3>Актерский курс</h3>
                        <ul class="course--character">
                            <li>постановка речи</li>
                            <li>актерское мастерство</li>
                            <li>пластика тела</li>
                            <li>тренинги на коммуникацию</li>
                            <li>этюды</li>
                            <li>актерское мастерство</li>
                        </ul>
                    </div>
                </a>
                <a href="#" class="courses_block" data-toggle="modal" data-target="#coursesModal">
                    <ul class="star">
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <div class="course_block--text">
                        <h3>Коммуникативный курс</h3>
                        <ul class="course--character">
                            <li>постановка речи</li>
                            <li>актерское мастерство</li>
                            <li>пластика тела</li>
                            <li>тренинги на коммуникацию</li>
                            <li>этюды</li>
                            <li>актерское мастерство</li>
                        </ul>
                    </div>
                    <button class="btn">Записаться</button>
                </a>
                <a href="#" class="courses_block">
                    <ul class="star">
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <div class="course_block--text">
                        <h3>Специальный курс</h3>
                        <ul class="course--character">
                            <li>постановка речи</li>
                            <li>актерское мастерство</li>
                            <li>пластика тела</li>
                            <li>тренинги на коммуникацию</li>
                            <li>этюды</li>
                            <li>актерское мастерство</li>
                        </ul>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- courses modal -->
    @include('includes.modal-form')

    <!-- teachers block -->
    @foreach($teachers as $teacher)
        <div class="modal fade teachers" id="myModal-{{ $teacher->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-left">
                        <img src="{{ ($teacher->teacher->image) ? asset('img/'. $teacher->teacher->image) : asset('img/user.jpg') }}">
                        <button class="btn">Подписаться</button>
                    </div>
                    <div class="modal-right">
                        <h3>{{ $teacher->teacher->surname .' '. $teacher->teacher->name}}</h3>
                        {!! $teacher->teacher->about !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- teachers -->
    @if (count($teachers) > 0)
        <div class="teachers">
            <div class="container">
                <h2>Наши преподаватели</h2>
                <div class="teachers-row">
                    @foreach($teachers as $teacher)
                        <a href="#" class="teachers_block" data-toggle="modal" data-target="#myModal-{{ $teacher->id }}">
                            <img src="{{ ($teacher->teacher->image) ? asset('img/'. $teacher->teacher->image) : asset('img/user.jpg') }}">
                            <div class="teachers-info">
                                <h4>{{ $teacher->teacher->surname .' '. $teacher->teacher->name }}</h4>
                                <p>{{ $teacher->teacher->profession }}<br>
                                    Стаж {{ $teacher->teacher->experience }}
                                </p>

                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- reviews -->
    <div class="reviews">
        <img src="{{ asset('imgs/background2.jpg') }}">
        <div class="container">
            <div class="reviews-slider">
                <div>
                    <div class="reviews--text">
                        <h2>Отзывы</h2>
                        <p>Театральной деятельностью я начала заниматься с детства. Поэтому мне очень понравилось заниматься на курсах и снова это вспоминать. Понравилось разделение курса на три ступени: это очень удобно и позволяет глубже вникнуть в весь преподаваемый материал. Персонал школы был очень отзывчив и внимателен к деталям - спасибо им за это! Я обязательно к вам вернусь!</p>
                        <h5>Иван Иванов</h5>
                    </div>
                </div>

                <div>
                    <div class="reviews--text">
                        <h2>Отзывы</h2>
                        <p>Театральной деятельностью я начала заниматься с детства. Поэтому мне очень понравилось заниматься на курсах и снова это вспоминать. Понравилось разделение курса на три ступени: это очень удобно и позволяет глубже вникнуть в весь преподаваемый материал. Персонал школы был очень отзывчив и внимателен к деталям - спасибо им за это! Я обязательно к вам вернусь!</p>
                        <h5>Иван Иванов</h5>
                    </div>
                </div>

                <div>
                    <div class="reviews--text">
                        <h2>Отзывы</h2>
                        <p>Театральной деятельностью я начала заниматься с детства. Поэтому мне очень понравилось заниматься на курсах и снова это вспоминать. Понравилось разделение курса на три ступени: это очень удобно и позволяет глубже вникнуть в весь преподаваемый материал. Персонал школы был очень отзывчив и внимателен к деталям - спасибо им за это! Я обязательно к вам вернусь!</p>
                        <h5>Иван Иванов</h5>
                    </div>
                </div>

                <div>
                    <div class="reviews--text">
                        <h2>Отзывы</h2>
                        <p>Театральной деятельностью я начала заниматься с детства. Поэтому мне очень понравилось заниматься на курсах и снова это вспоминать. Понравилось разделение курса на три ступени: это очень удобно и позволяет глубже вникнуть в весь преподаваемый материал. Персонал школы был очень отзывчив и внимателен к деталям - спасибо им за это! Я обязательно к вам вернусь!</p>
                        <h5>Иван Иванов</h5>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection

@section('footer-content')
    <script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
@endsection
