@extends('layouts.app')


@section('content')

    <div class="page-wrapper"> <!-- content -->
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                        <h5 class="text-uppercase">Добавить группу</h5>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                        <ul class="list-inline breadcrumb float-right">
                            <li class="list-inline-item"><a href="/">Главная</a></li>
                            <li class="list-inline-item"><a href="{{ route('admin.group.index') }}">Группы</a></li>
                            <li class="list-inline-item">Добавить занятие</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.group.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" id="students_id" name="students_id">
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <h4 class="card-title">Данные занятии</h4><br>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Имя:</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="name" required>
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Группа:</label>
                                            <div class="col-lg-9 custom-mt-form-group">
                                                <select name="group">
                                                    <option value="">Список групп</option>
                                                    @foreach(Dict::groups() as $group)
                                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('group'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('group') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Преподаватель:</label>
                                            <div class="col-lg-9 custom-mt-form-group">
                                                <select name="teacher">
                                                    <option value="">Список препадавателей</option>
                                                    @foreach(Dict::teachers() as $teacher)
                                                        <option value="{{ $teacher->id }}">{{ $teacher->teacher->surname .' '. $teacher->teacher->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('teacher'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('teacher') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Зал:</label>
                                            <div class="col-lg-9 custom-mt-form-group">
                                                <select name="room">
                                                    <option value="">Список залов</option>
                                                    @foreach(Dict::rooms() as $key => $value)
                                                        <option value="{{ $key }}">{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('room'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('room') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Дата и время:</label>
                                            <div class="col-lg-9 custom-mt-form-group">
                                                <input type="text" id="time" class="form-control" name="time">
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
    <script>
        $(function () {
            $('#time').datetimepicker({locale: 'ru'});
            $("#setMinDate").click(function () {
                $('#datetimepicker3').data("DateTimePicker").minDate(moment('05.11.2017','DD.MM.YYYY'));
            });
            $("#setMaxDate").click(function () {
                $('#datetimepicker3').data("DateTimePicker").maxDate(moment('25.11.2017','DD.MM.YYYY'));
                $('#datetimepicker3').data("DateTimePicker").date(null);
            });
            $("#show").click(function () {
                $('#datetimepicker3').data("DateTimePicker").show();
            });
            $("#hide").click(function () {
                $('#datetimepicker3').data("DateTimePicker").hide();
            });
            $("#disable").click(function () {
                $('#datetimepicker3').data("DateTimePicker").disable();
            });
            $("#enable").click(function () {
                $('#datetimepicker3').data("DateTimePicker").enable();
            });
            $("#setDate").click(function () {
                $('#datetimepicker3').data("DateTimePicker").date(moment('15.11.2017','DD.MM.YYYY'));
            });
            $("#getDate").click(function () {
                alert($('#datetimepicker3').data("DateTimePicker").date());
            });
        });
    </script>
@endsection