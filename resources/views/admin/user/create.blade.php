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
                        <h5 class="text-uppercase">Добавить {{ ($role->id == 3) ? 'ученика' : 'преподавателя'}}</h5>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                        <ul class="list-inline breadcrumb float-right">
                            <li class="list-inline-item"><a href="{{ route('admin.home') }}">Главная</a></li>
                            <li class="list-inline-item"><a href="{{ route('admin.user.index', ['role' => $role->id]) }}">{{ ($role->id == 3) ? 'Ученики' : 'Преподаватель'}}</a></li>
                            <li class="list-inline-item">Добавить пользователя</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="card-box">
                                <div class="row">
                                    <div class="col-md-5">
                                        <h4 class="card-title">Фотография акаунта</h4><br>
                                        <div class="form-group row offset-md-3" style="margin-top: 20px">
                                            <img src="{{ asset('img/user.jpg') }}" class="avatar-big" id="myimage">
                                            <div class="col-lg-9">
                                                <input type="file" onchange="onFileSelected(event)" name="image" style="margin-top: 20px">
                                                @if ($errors->has('image'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('image') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="card-title">Персональные данные</h4><br>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Email:</label>
                                            <div class="col-lg-9">
                                                <input type="email" class="form-control" name="email" required>
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Имя:</label>
                                            <div class="col-lg-9">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="text" placeholder="Фамилия" class="form-control" name="surname" required>
                                                        @if ($errors->has('surname'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('surname') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" placeholder="Имя" class="form-control" name="name" required>
                                                        @if ($errors->has('name'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">День рождения:</label>
                                            <div class="col-lg-9">
                                                <input type="text" id="birthday" class="form-control" name="birthday" readonly>
                                                @if ($errors->has('birthday'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('birthday') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        @if ($role->id == 3)
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Имя родителя:</label>
                                                <div class="col-lg-9">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input type="text" placeholder="Фамилия" class="form-control" name="parent_surname">
                                                            @if ($errors->has('parent_surname'))
                                                                <span class="help-block">
                                                                <strong>{{ $errors->first('parent_surname') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" placeholder="Имя" class="form-control" name="parent_name">
                                                            @if ($errors->has('parent_name'))
                                                                <span class="help-block">
                                                                <strong>{{ $errors->first('parent_name') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Пол</label>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender" value="1" checked>
                                                    <label class="form-check-label" for="gender">
                                                        Парень
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender" value="0">
                                                    <label class="form-check-label" for="gender">
                                                        Девушка
                                                    </label>
                                                </div>
                                                @if ($errors->has('gender'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('gender') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Телефонный номер:</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="phone_number">
                                                @if ($errors->has('phone_number'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Адрес:</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control m-b-20" name="address">
                                                @if ($errors->has('address'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('address') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        @if ($role->id == 3)
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Группа:</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" id="group" name="group">
                                                        <option value=""></option>
                                                        @foreach(Dict::groups() as $group)
                                                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($role->id == 2)
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Стаж:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="experience">
                                                    @if ($errors->has('experience'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('experience') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Профессия:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="profession">
                                                    @if ($errors->has('profession'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('profession') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">О себе:</label>
                                                <div class="col-lg-9">
                                                    <textarea name="about"></textarea>
                                                    @if ($errors->has('about'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('about') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <input type="hidden" name="role_id" value="{{ $role->id }}">
                                    <input type="hidden" name="view" value="{{ $view }}">
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Отправить</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script type="text/javascript" src="{{ asset('bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bootstrap-datepicker/dist/locales/bootstrap-datepicker.ru.min.js') }}"></script>

    <script>
        function onFileSelected(event) {
            var selectedFile = event.target.files[0];
            var reader = new FileReader();

            var imgtag = document.getElementById("myimage");
            imgtag.title = selectedFile.name;

            reader.onload = function(event) {
                imgtag.src = event.target.result;
            };

            reader.readAsDataURL(selectedFile);
        }
        $(document).ready(function() {
            $('input[name="phone_number"]').mask('0 (000) 000 00-00');

        });
        $('#birthday').datepicker({
            format: 'dd.mm.yyyy',
            language: 'ru',
            autoclose: true,
            todayBtn: 'linked',
            pickerPosition: "bottom-left",
            startView: 2,
            todayHighlight: true
        });

        @if ($role->id == 2)
            $('textarea').ckeditor();
        @endif
    </script>
@endsection
