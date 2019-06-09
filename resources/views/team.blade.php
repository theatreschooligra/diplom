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
    @foreach($teachers as $teacher)
        <div class="modal fade teachers" id="myModal-{{ $teacher->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-left">
                            <img src="{{ ($teacher->image) ? asset('img/'. $teacher->image) : asset('img/user.jpg') }}">
                            <button class="btn">Подписаться</button>
                        </div>
                        <div class="modal-right">
                            <h3>{{ $teacher->surname .' '. $teacher->name }}</h3>
                            {!! $teacher->teacher->about !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="team">
        <div class="teachers">
            <div class="container">
                <h2>Наша команда</h2>
                <div class="teachers-row">
                    @foreach($teachers as $teacher)
                        @if( ($loop->index + 1) % 3 == 0)
                                <a href="#" class="teachers_block" data-toggle="modal" data-target="#myModal-{{ $teacher->id }}">
                                    <img src="{{ ($teacher->image) ? asset('img/'. $teacher->image) : asset('img/user.jpg') }}">
                                    <div class="teachers-info">
                                        <h4>{{ $teacher->surname .' '. $teacher->name }}</h4>
                                        <p>{{ $teacher->teacher->profession }}<br>
                                            {{ $teacher->teacher->experience }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div class="teachers-row">
                        @else
                            <a href="#" class="teachers_block" data-toggle="modal" data-target="#myModal-{{ $teacher->id }}">
                                <img src="{{ ($teacher->image) ? asset('img/'. $teacher->image) : asset('img/user.jpg') }}">
                                <div class="teachers-info">
                                    <h4>{{ $teacher->surname .' '. $teacher->name }}</h4>
                                    <p>{{ $teacher->teacher->profession }}<br>
                                        {{ $teacher->teacher->experience }}
                                    </p>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer-content')
    <script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
@endsection