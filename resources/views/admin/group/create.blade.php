@extends('admin.layouts.app')

@section('header-content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

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
                            <li class="list-inline-item"><a href="{{ route('admin.home') }}">Главная</a></li>
                            <li class="list-inline-item"><a href="{{ route('admin.group.index') }}">Группы</a></li>
                            <li class="list-inline-item">Добавить группу</li>
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
                                        <h4 class="card-title">Данные группы</h4><br>
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
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Преподаватели:</label>
                                            <div class="col-lg-9 custom-mt-form-group">
                                                <select id="selectTeacher" name="teachers[]" multiple="multiple">
                                                    @foreach(Dict::teachers() as $row)
                                                        <option id="student-in-selection-{{ $row->id }}" value="{{ $row->id }}">{{ $row->surname .' '. $row->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('teachers'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('teachers') }}</strong>
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
                                                    @foreach(Dict::listOfStudentsToGroup() as $row)
                                                        <option id="student-in-selection-{{ $row->id }}" value="{{ $row->id }}">{{ $row->surname .' '. $row->name }}</option>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>

        $(document).ready(function() {
            $('#selectTeacher').select2();
        });

        var arrayOfSelectedStudents = [];

        $('#addStudents').on('click', function () {
            var id = $('#selectStudent').val();
            if (id != 0) {

                arrayOfSelectedStudents.push(parseInt(id, 10));

                $.ajax({
                    url: "/admin/api/users/"+ id,
                    method: 'GET',
                    dataType: 'json',
                    success: function (data) {

                        $('#list-of-students').append('<tr class="student-'+ data.data.id +'">' +
                                '<td>'+ arrayOfSelectedStudents.length +'</td>' +
                                '<td>' + data.data.surname + '</td>' +
                                '<td>' + data.data.name + '</td>' +
                                '<td>' + data.data.email + '</td>' +
                                '<td>' +
                                    '<button type="button" class="btn btn-danger btn-sm" onclick="RemoveUser('+ data.data.id +')">Удалить</button>' +
                                '</td>' +
                            '</tr>');

                        $('#students_id').val(arrayOfSelectedStudents);
                        $('#student-in-selection-' + data.data.id).hide();
                        $('#selectStudent').val(0);

                    }, error: function (error) {
                        console.log("ERRROR: "+ error);
                    }
                });
            }
        });

        function RemoveUser(id) {
            $('.student-'+ id).remove();
            $('#student-in-selection-' + id).show();
            var index = arrayOfSelectedStudents.indexOf(id);
            if (index > -1)
                arrayOfSelectedStudents.splice(index, 1);
        }
    </script>
@endsection
