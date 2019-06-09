@extends('admin.layouts.app')

@section('content')

    <div class="page-wrapper"> <!-- content -->
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                        <h5 class="text-uppercase">Редактировать данные репертара</h5>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                        <ul class="list-inline breadcrumb float-right">
                            <li class="list-inline-item"><a href="{{ route('admin.home') }}">Главная</a></li>
                            <li class="list-inline-item"><a href="{{ route('admin.repertoire.index') }}">Репертуары</a></li>
                            <li class="list-inline-item">Редактировать репертуар</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.repertoire.update', $repertoire->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <h4 class="card-title">Данные репертуара</h4><br>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Имя:</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="name" value="{{ $repertoire->name }}" required>
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Фото:</label>
                                            <div class="col-lg-9">
                                                <input type="file" class="form-control" name="image">
                                                @if ($errors->has('image'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('image') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Время:</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" id="time" name="time" value="{{ $repertoire->time }}" required>
                                                @if ($errors->has('time'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('time') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Возрастное ограничение:</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="age_limit" value="{{ $repertoire->age_limit }}" required>
                                                @if ($errors->has('age_limit'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('age_limit') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Цена:</label>
                                            <div class="col-lg-9">
                                                <input type="number" class="form-control" name="price" value="{{ $repertoire->price }}" required>
                                                @if ($errors->has('price'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('price') }}</strong>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script>
        $(document).ready( function () {

        });
    </script>
@endsection
