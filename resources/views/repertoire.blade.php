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
                    @foreach($repertoire as $row)
                        <li><a href="#" data-toggle="modal" id="repertoire-{{ $row->id }}" data-target="#repertoryModal">
                                <div class="repertory-left">
                                    <div class="date">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->time)->format('d') .' '. config('month.'. \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->time)->format('m')) }}</div>
                                    <h5>{{ $row->name }} <br><span class="room">возрастная ограничения ({{ $row->age_limit }})</span><span class="time">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->time)->format('H:i') }}</span></h5>
                                </div>
                                <button class="btn">Купить</button>
                            </a>
                        </li>
                    @endforeach
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
