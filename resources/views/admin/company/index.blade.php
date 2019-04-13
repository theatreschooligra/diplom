@extends('admin.layouts.app')

@section('content')

    <div class="page-wrapper"> <!-- content -->
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                        <h5 class="text-uppercase">Информация школы</h5>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                        <ul class="list-inline breadcrumb float-right">
                            <li class="list-inline-item"><a href="{{ route('home') }}">Главная</a></li>
                            <li class="list-inline-item">Информация школы</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.company.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="card-title">Данные школы</h4><br>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Почта:</label>
                                            <div class="col-lg-9">
                                                <input type="email" class="form-control" name="email" value="{{ $company->email }}" required {{ (count($errors) > 0) ? '' : 'readonly' }}>
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Адрес:</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="address" value="{{ $company->address }}" required {{ (count($errors) > 0) ? '' : 'readonly' }}>
                                                @if ($errors->has('address'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('address') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Телефонный номер:</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="phone_number" value="{{ $company->phone_number }}" required {{ (count($errors) > 0) ? '' : 'readonly' }}>
                                                @if ($errors->has('phone_number'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Ссылка на youtube:</label>
                                            <div class="col-lg-9">
                                                <input type="text" value="{{ $company->url_to_youtube }}" class="form-control" name="url_to_youtube" required {{ (count($errors) > 0) ? '' : 'readonly' }}>
                                                @if ($errors->has('url_to_youtube'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('url_to_youtube') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Ссылка на facebook:</label>
                                            <div class="col-lg-9">
                                                <input type="text" value="{{ $company->url_to_facebook }}" class="form-control" name="url_to_facebook" required {{ (count($errors) > 0) ? '' : 'readonly' }}>
                                                @if ($errors->has('url_to_facebook'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('url_to_facebook') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Ссылка на instagram:</label>
                                            <div class="col-lg-9">
                                                <input type="text" value="{{ $company->url_to_instagram }}" class="form-control" name="url_to_instagram" required {{ (count($errors) > 0) ? '' : 'readonly' }}>
                                                @if ($errors->has('url_to_instagram'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('url_to_instagram') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Ссылка на карту:</label>
                                            <div class="col-lg-9">
                                                <input type="text" value="{{ $company->map }}" class="form-control" name="map" required {{ (count($errors) > 0) ? '' : 'readonly' }}>
                                                @if ($errors->has('map'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('map') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">О нас:</label>
                                            <div class="col-lg-9" id="about-paragraph-block" style="display: {{ (count($errors) > 0) ? 'none' : '' }}">
                                                {!! $company->about !!}
                                            </div>
                                            <div class="col-lg-9" id="about-editor-block" style="display: {{ (count($errors) > 0) ? '' : 'none' }}">
                                                <textarea name="about" style="height: 100px">{{ $company->about }}</textarea>
                                                @if ($errors->has('about'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('about') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" id="submit-btn" class="btn btn-primary"  style="display: {{ (count($errors) > 0) ? '' : 'none' }}">Отправить</button>
                                    <button type="button" id="edit-btn" class="btn btn-primary" style="display: {{ (count($errors) > 0) ? 'none' : '' }}">Редактировать</button>
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
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>

    <script type="text/javascript">
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
            $('input[name="phone_number"]').mask('+7 000 000 00 00');

            $('textarea').ckeditor();

            $('#edit-btn').on('click', function () {
                $('#edit-btn').hide();
                $('#submit-btn').show();

                $('input[name="email"]').prop('readonly', false);
                $('input[name="address"]').prop('readonly', false);
                $('input[name="phone_number"]').prop('readonly', false);
                $('input[name="url_to_youtube"]').prop('readonly', false);
                $('input[name="url_to_facebook"]').prop('readonly', false);
                $('input[name="url_to_instagram"]').prop('readonly', false);
                $('input[name="map"]').prop('readonly', false);

                $('#about-editor-block').show();
                $('#about-paragraph-block').hide();
            });
        });
        
    </script>
@endsection
