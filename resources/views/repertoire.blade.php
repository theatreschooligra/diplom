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
                <li><a href="{{ route('home') }}">Главная</a></li>
                <li>Репертуары</li>
            </ul>
        </div>
    </div>

    <div class="repertory">
        <img src="{{ asset('imgs/slider2.jpg') }}">
        <div class="container">
            <h1>Репертуары</h1>
            <div class="repertory_block">
                <ul>
                    <li><a href="#" data-toggle="modal" data-target="#repertoryModal">
                            <div class="repertory-left">
                                <div class="date">12 МРТ</div>
                                <h5>Богемская Рапсодия <br><span class="room">возрастная ограничения</span><span class="time">18:00</span></h5>
                            </div>
                            <button class="btn">Купить</button>
                        </a>
                    </li>
                    <li><a href="#">
                            <div class="repertory-left">
                                <div class="date">12 МРТ</div>
                                <h5>Богемская Рапсодия <br><span class="room">возрастная ограничения</span><span class="time">18:00</span></h5>
                            </div>
                            <button class="btn">Купить</button>
                        </a>
                    </li>
                    <li><a href="#">
                            <div class="repertory-left">
                                <div class="date">12 МРТ</div>
                                <h5>Богемская Рапсодия <br><span class="room">возрастная ограничения</span><span class="time">18:00</span></h5>
                            </div>
                            <button class="btn">Купить</button>
                        </a>
                    </li>
                    <li><a href="#">
                            <div class="repertory-left">
                                <div class="date">12 МРТ</div>
                                <h5>Богемская Рапсодия <br><span class="room">возрастная ограничения</span><span class="time">18:00</span></h5>
                            </div>
                            <button class="btn">Купить</button>
                        </a>
                    </li>
                    <li><a href="#">
                            <div class="repertory-left">
                                <div class="date">12 МРТ</div>
                                <h5>Богемская Рапсодия <br><span class="room">возрастная ограничения</span><span class="time">18:00</span></h5>
                            </div>
                            <button class="btn">Купить</button>
                        </a>
                    </li>
                    <li><a href="#">
                            <div class="repertory-left">
                                <div class="date">12 МРТ</div>
                                <h5>Богемская Рапсодия <br><span class="room">возрастная ограничения</span><span class="time">18:00</span></h5>
                            </div>
                            <button class="btn">Купить</button>
                        </a>
                    </li>
                    <li><a href="#">
                            <div class="repertory-left">
                                <div class="date">12 МРТ</div>
                                <h5>Богемская Рапсодия <br><span class="room">возрастная ограничения</span><span class="time">18:00</span></h5>
                            </div>
                            <button class="btn">Купить</button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- repertory modal -->
    <div class="modal fade ticket" id="repertoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                    <h3>Купить билет</h3>
                </div>
                <div class="modal-body">
                    <div class="request">
                        <form>
                            <input type="text" placeholder="Имя">
                            <input type="text" name="tel" placeholder="+7 (999) 999-99-99">
                            <input type="text" placeholder="Количество билетов">
                            <input type="submit" value="Отправить" class="btn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-content')
    <script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
@endsection