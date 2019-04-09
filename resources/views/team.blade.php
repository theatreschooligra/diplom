@extends('app')

@section('head-content')
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap-theme.min.css') }}"/>
@endsection

@section('content')
    <!-- bread -->
    <div class="bread">
        <div class="container">
            <ul>
                <li><a href="#">Главная</a></li>
                <li>Команда</li>
            </ul>
        </div>
    </div>

    <!-- teachers block -->

    <!-- teachers modal -->
    <div class="modal fade teachers" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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

    <div class="team">
        <div class="teachers">
            <div class="container">
                <h2>Наша команда</h2>
                @for($i = 0; $i < 3; $i++)
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
                            <img src="{{ asset('imgs/teacher-1.png') }}">
                            <div class="teachers-info">
                                <h4>Сабина Нурмагановна</h4>
                                <p>Актерское мастерство<br>
                                    Стаж 5лет
                                </p>
                            </div>
                        </a>
                        <a href="#" class="teachers_block" data-toggle="modal" data-target="#myModal">
                            <img src="{{ asset('imgs/teacher-1.png') }}">
                            <div class="teachers-info">
                                <h4>Сабина Нурмагановна</h4>
                                <p>Актерское мастерство<br>
                                    Стаж 5лет
                                </p>
                            </div>
                        </a>
                    </div>
                @endfor
            </div>
        </div>
    </div>

@endsection

@section('footer-content')
    <script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
@endsection