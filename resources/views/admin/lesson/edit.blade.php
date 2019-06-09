@extends('admin.layouts.app')

@section('head-content')
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endsection

@section('content')

    <div class="page-wrapper"> <!-- content -->
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                        <h5 class="text-uppercase">Редактировать данные занятии</h5>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                        <ul class="list-inline breadcrumb float-right">
                            <li class="list-inline-item"><a href="{{ route('admin.home') }}">Главная</a></li>
                            <li class="list-inline-item"><a href="{{ route('admin.lesson.index') }}">Занятие</a></li>
                            <li class="list-inline-item">Редактировать занятие</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.lesson.update', $lesson->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <h4 class="card-title">Данные занятии</h4><br>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Имя:</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="name" value="{{ $lesson->name }}" required>
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Группа:</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" name="group_id" value="{{ $lesson->group->name }}" readonly>
                                                @if ($errors->has('group_id'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('group_id') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Преподаватель:</label>
                                            <div class="col-lg-9 custom-mt-form-group">
                                                <select name="teacher_id" id="teacher">
                                                    <option value="0">Выбрать ...</option>
                                                    @foreach($lesson->group->teachers as $row)
                                                        <option {{ ($lesson->teacher_id == $row->id) ? 'selected' : '' }} value="{{ $row->id }}">{{ $row->teacher->surname .' '. $row->teacher->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('teacher'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('teacher') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">День провидения:</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control lesson_date_time" id="lesson_date" name="lesson_date" value="{{ $lesson->lesson_date->format('d/m/Y') }}" readonly required>
                                                @if ($errors->has('lesson_date'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('lesson_date') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Время проведения:</label>
                                            <div class="col-lg-9 custom-mt-form-group">
                                                <select name="lesson_time" id="lesson_time" class="lesson_date_time">
                                                    <option value="0">Выбрать ...</option>
                                                    @foreach(Dict::lesson_times() as $key => $value)
                                                        <option {{ ($lesson->lesson_time == $key) ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('lesson_name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('lesson_time') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Зал:</label>
                                            <div class="col-lg-9 custom-mt-form-group">
                                                <select name="room" id="room">
                                                    <option value="0">Выбрать ...</option>
                                                    @foreach($rooms as $key => $value)
                                                        <option {{ ($lesson->room == $key) ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('room'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('room') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Домашное задание:</label>
                                            <div class="col-lg-9 custom-mt-form-group">
                                                <select name="homework_id">
                                                    <option value="">Выбрать ...</option>
                                                    @foreach($homework as $row)
                                                        <option {{ $row->id == $lesson->homework_id ? 'selected' : '' }} value="{{ $row->id }}">{{ $row->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('homework_id'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('homework_id') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-primary">Отправить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-content')
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>--}}
    <script type="text/javascript" src="{{ asset('bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bootstrap-datepicker/dist/locales/bootstrap-datepicker.ru.min.js') }}"></script>
    <script>
        $(document).ready( function () {

            $('.lesson_date_time').on('change', function () {
                var lesson_date = $('#lesson_date').val();
                var lesson_time = $('#lesson_time').val();
                if (lesson_date != null && lesson_date != '' && lesson_time != null && lesson_time != 0) {
                    $.ajax({
                        url: "/admin/api/get-rooms",
                        method: "POST",
                        dataType: 'json',
                        data: {
                            '_token'      : $('input[name="_token"]').val(),
                            'lesson_date' : lesson_date,
                            'lesson_time' : lesson_time
                        },
                        success: function (data) {
                            $('#room').html('<option value="0">Выбрать ...</option>');
                            for (const [key, value] of Object.entries(data)) {
                                $('#room').append('<option value="'+ key +'">'+ value +'</option>');
                            }
                        }
                    });
                }
            });
        });

        $('#lesson_date').datepicker({
            format: 'dd.mm.yyyy',
            language: 'ru',
            autoclose: true,
            todayBtn: 'linked',
            pickerPosition: "bottom-left",
            todayHighlight: true
        });
    </script>
@endsection
