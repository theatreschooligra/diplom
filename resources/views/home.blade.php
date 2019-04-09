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
                    <button class="btn">Записаться</button>
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
                    <button class="btn">Записаться</button>
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
                    <button class="btn">Записаться</button>
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
                        <img src="{{ asset('imgs/rising.png') }}">
                    </div>
                    <h3>Преподаватели</h3>
                    <p>Все преподаватели действующие актеры театра.</p>
                </div>
                <div class="advantages_block">
                    <div class="advantages_block-top">
                        <img src="{{ asset('imgs/adv-2.png') }}">
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
    </div>

    <!-- spectacles -->
    <div class="spectacles">
        <div class="container">
            <h2>Ближайшие спектакли</h2>
            <div class="spectacles-slider">
                <div>
                    <a href="#" class="spectacles-block">
                        <div class="spectacles-img"><img src="{{ asset('imgs/spectacle-1.jpg') }}">
                            <div class="spectacles-date">
                                <span> 02 </span>
                                Май
                            </div>
                        </div>

                        <div class="spectacles-text">
                            <h4>Горе от ума</h4>
                            <p><span>Режиссер:</span> Джанатон Смит</p>
                            <button class="btn">Посмотреть</button>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#" class="spectacles-block">
                        <div class="spectacles-img"><img src="{{ asset('imgs/spectacle-2.jpg') }}">
                            <div class="spectacles-date">
                                <span>02 </span>Май
                            </div>
                        </div>
                        <div class="spectacles-text">
                            <h4>Горе от ума</h4>
                            <p><span>Режиссер:</span> Джанатон Смит</p>
                            <button class="btn">Посмотреть</button>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#" class="spectacles-block">
                        <div class="spectacles-img"><img src="{{ asset('imgs/spectacle-3.jpg') }}">
                            <div class="spectacles-date">
                                <span>02 </span>Май
                            </div>
                        </div>
                        <div class="spectacles-text">
                            <h4>Горе от ума</h4>
                            <p><span>Режиссер:</span> Джанатон Смит</p>
                            <button class="btn">Посмотреть</button>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#" class="spectacles-block">
                        <div class="spectacles-img"><img src="{{ asset('imgs/spectacle-3.jpg') }}">
                            <div class="spectacles-date">
                                <span>02 </span>Май
                            </div>
                        </div>
                        <div class="spectacles-text">
                            <h4>Горе от ума</h4>
                            <p><span>Режиссер:</span> Джанатон Смит</p>
                            <button class="btn">Посмотреть</button>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

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
    <div class="modal fade" id="coursesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                    <h3>Запишитесь на бесплатное занятие</h3>
                    <p>Познакомьтесь с преподавателями и методикой школы "Игра"</p>
                </div>
                <div class="modal-body">
                    <div class="request">
                        <form>
                            <input type="text" placeholder="Имя">
                            <input type="text" name="tel" placeholder="+7 (999) 999-99-99">
                            <input type="text" placeholder="E-mail">
                            <input type="number" placeholder="Возраст ребенка">
                            <input type="submit" value="Отправить" class="btn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- teachers block -->

    <div class="modal fade teachers" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-left">
                        <img src="{{ asset('imgs/teacher-1.png') }}">
                        <button class="btn">Подписаться</button>
                    </div>
                    <div class="modal-right">
                        <h3>Айнур Асанова</h3>
                        <p>Илья Соболев, Народный артист РК, Лауреат государственной премии, Кавалер орденов «Парасат», «Отан», Ордена «Красного знамени», обладатель нагрудного знака «Заслуженный деятель искусств»

                            Родился в 1936 году в Южно Казахстанской области, в районе Арыс.

                            1955 – 1959 гг. oкончил театральный факультет Казахской Государственной консерватории им.Курмангазы, по специальности актер.

                            С 1960 г. по настоящее время – актер театра им. М. Ауэзова.

                            Начал свой творческий путь с комедийного жанра, блистал в спектаклях «Волчонок под шапкой»,
                            «Сватья приехала» К. Мухамеджнаова, «Ох, уж эти девушки!» К. Шангытбаева и К. Байсейтова.
                            За полвека работы на сцене театра актер создал более 100 ролей из казахской и мировой классики,
                            современной драматургии. Самые яркие образы это Жантык в «Козы Корпеш – Баян сулу» Г. Мусрепова,
                            Дурбит в «Майре»А. Тажибаева, Жаяу Муса в «Жаяу Муса» З. Шашкина, Муров в пьесе «Без вины виноватые»
                            А. Осторвского, Исабек в « Восхождении на Фудзияму» К. Мухамеджанова и Ч. Айтматова, Достоевский в спек.
                            «Узник степей» О. Бодыкова, Хан Абулхаир в «Клятве» Т. Ахтанова, Правитель округа в «Ревизоре» Н. Гоголя,
                            Суйеу в спектакле «Кровь и пот» А. Нурпейсова, Асан в «Везучем парне» А. Тарази, Демесин в спектакле
                            «Стражник тишины» Д. Исабекова, Серебряков в «дяде Ваня» Чехова, и другие не похожие друг на друга
                            значительные персонажи.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- teachers -->

    <div class="teachers">
        <div class="container">
            <h2>Наши преподаватели</h2>
            <div class="teachers-row">
                <a href="#" class="teachers_block" data-toggle="modal" data-target="#myModal">
                    <img src="{{ asset('imgs/teacher-1.png') }}">
                    <div class="teachers-info">
                        <h4>Сабина Нурмагановна</h4>
                        <p>Актерское мастерство<br>
                            Стаж 5лет
                        </p>

                    </div>
                </a>
                <a href="#" class="teachers_block" data-toggle="modal" data-target="#myModal">
                    <img src="{{ asset('imgs/teacher-2.png') }}">
                    <div class="teachers-info">
                        <h4>Сабина Нурмагановна</h4>
                        <p>Актерское мастерство<br>
                            Стаж 5лет
                        </p>

                    </div>
                </a>
                <a href="#" class="teachers_block" data-toggle="modal" data-target="#myModal">
                    <img src="{{ asset('imgs/teacher-3.png') }}">
                    <div class="teachers-info">
                        <h4>Сабина Нурмагановна</h4>
                        <p>Актерское мастерство<br>
                            Стаж 5лет
                        </p>

                    </div>
                </a>
            </div>
        </div>
    </div>

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