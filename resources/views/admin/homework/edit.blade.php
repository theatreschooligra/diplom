@extends('admin.layouts.app')

@section('content')

    <div class="page-wrapper"> <!-- content -->
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                        <h5 class="text-uppercase">Редактировать данные домашного задания</h5>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                        <ul class="list-inline breadcrumb float-right">
                            <li class="list-inline-item"><a href="{{ route('admin.home') }}">Главная</a></li>
                            <li class="list-inline-item"><a href="{{ route('admin.homework.index') }}">Домашное задание</a></li>
                            <li class="list-inline-item">Редактировать домашное задание</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.homework.update', $homework->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <h4 class="card-title">Данные домашный задании</h4><br>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Имя:</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="name" value="{{ $homework->name  }}" required>
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Файл:</label>
                                            <div class="col-lg-9">
                                                <input type="file" class="form-control" name="file">
                                                @if ($errors->has('file'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('file') }}</strong>
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