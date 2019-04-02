@extends('layouts.app')

@section('content')

    <div class="page-wrapper"> <!-- content -->
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                        <h5 class="text-uppercase">Редактировать ученика</h5>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                        <ul class="list-inline breadcrumb float-right">
                            <li class="list-inline-item"><a href="/">Главная</a></li>
                            <li class="list-inline-item"><a href="{{ route('admin.group.index') }}">Группы</a></li>
                            <li class="list-inline-item">Редактировать группу</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.group.update', $group->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="students_id" name="students_id"
                                   value="{{ implode(",", Dict::listOfStudentsIncludedGroup($group->id)->pluck('id')->toArray()) }}">
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <h4 class="card-title">Данные группы</h4><br>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Имя:</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="name" value="{{ $group->name }}" required>
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
                                            <label class="col-lg-3 col-form-label">Ученики:</label>
                                            <div class="col-lg-9 custom-mt-form-group">
                                                <select id="selectStudent">
                                                    <option id="student-in-selection" value="0">Список учеников</option>
                                                    @foreach(Dict::listOfStudentsNotIncludedGroup() as $row)
                                                        <option id="student-in-selection-{{ $row->user_id }}" value="{{ $row->user_id }}">{{ $row->surname .' '. $row->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right" style="margin-top: 11px">
                                        <button type="button" class="btn btn-light" id="addStudents">Добавить</button>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Фамилия</th>
                                                    <th scope="col">Имя</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Действия</th>
                                                </tr>
                                                </thead>
                                                <tbody id="list-of-students">
                                                    @foreach(Dict::listOfStudentsIncludedGroup($group->id) as $row)
                                                        <tr class="student-{{ $row->id }}">
                                                            <td>{{ $loop->index+1 }}</td>
                                                            <td>{{ $row->fields->surname }}</td>
                                                            <td>{{ $row->fields->name }}</td>
                                                            <td>{{ $row->email }}</td>
                                                            <td><button type="button" class="delete-modal btn btn-danger btn-sm" value="{{ $row->id }}">Удалить</button></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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

        var arrayOfSelectedStudents = $('#students_id').val().split(',');

        $('#addStudents').on('click', function () {
            console.log(arrayOfSelectedStudents);
            var id = $('#selectStudent').val();
            if (id != 0) {
                arrayOfSelectedStudents.push(id);

                $.ajax({
                    url: "/api/users/"+ id,
                    method: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#list-of-students').append('<tr class="student-'+ data.data.id +'">' +
                            '<td>'+ arrayOfSelectedStudents.length +'</td>' +
                            '<td>' + data.data.surname + '</td>' +
                            '<td>' + data.data.name + '</td>' +
                            '<td>' + data.data.email + '</td>' +
                            '<td><button type="button" class="delete-modal btn btn-danger btn-sm" value="' + data.data.id + '">Удалить</button></td>' +
                            '</tr>');
                        $('#students_id').val(arrayOfSelectedStudents);
                        $('#student-in-selection-' + data.data.id).remove();
                    }, error: function (error) {
                        console.log("ERRROR: "+ error);
                    }
                });
            }
        });

        $('.delete-modal').on('click', function () {
            console.log('delete-link');
        })
    </script>
@endsection
