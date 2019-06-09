@extends('admin.layouts.app')

@section('content')

    <div class="page-wrapper"> <!-- content -->
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                        <h5 class="text-uppercase">Редактировать данные группы</h5>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                        <ul class="list-inline breadcrumb float-right">
                            <li class="list-inline-item"><a href="{{ route('admin.home') }}">Главная</a></li>
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
                            <input type="hidden" name="group_id" value="{{ $group->id }}">
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
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Преподаватели:</label>
                                            <div class="col-lg-9 custom-mt-form-group">
                                                <select id="selectTeacher" name="teachers[]" multiple="multiple">
                                                    @foreach(Dict::teachers() as $row)
                                                        <option {{ (in_array($row->id, $group->teachers->pluck('id')->toArray())) ? 'selected' : '' }}
                                                                id="student-in-selection-{{ $row->id }}" value="{{ $row->id }}">{{ $row->surname .' '. $row->name }}</option>
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
                                                    <th scope="col">Пробный</th>
                                                    <th scope="col">Действия</th>
                                                </tr>
                                                </thead>
                                                <tbody id="list-of-students">
                                                    @foreach(Dict::listOfStudentsToGroup($group->id) as $row)
                                                        <tr class="student-{{ $row->id }}">
                                                            <td>{{ $loop->index+1 }}</td>
                                                            <td>{{ $row->surname }}</td>
                                                            <td>{{ $row->name }}</td>
                                                            <td>{{ $row->email }}</td>
                                                            <td><input type="checkbox" {{ ($row->fields->is_trial) ? 'checked' : 'disable' }}></td>
                                                            <td><button type="button" class="delete-modal btn btn-danger btn-sm" onclick="groupUser({{ $row->id }}, 0)">Удалить</button></td>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>

        $(document).ready(function() {
            $('#selectTeacher').select2();
        });

        $('#addStudents').on('click', function () {
            var id = $('#selectStudent').val();
            if (id != 0) {
                groupUser(id, $('input[name="group_id"]').val());
            }
        });

        function listOfStudentsInSelection() {
            $('#selectStudent').html('<option id="student-in-selection" value="0">Список учеников</option>');
            $.ajax({
                url: '/admin/api/users?group_id='+ null,
                method: 'GET',
                dataType: 'json',
                success: function (data) {

                    for (var i = 0; i < data.data.length; i++) {
                        $('#selectStudent').append('<option id="student-in-selection-'+ data.data[i].id +'" value="'+ data.data[i].id +'">' +
                            data.data[i].surname +' '+ data.data[i].name +
                            '</option>')
                    }
                }
            });
        }

        function listOfStudentsInTable() {
            $('#list-of-students').html('');
            $.ajax({
                url: "/admin/api/users?group_id={{ $group->id }}",
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    for (var i = 0; i < data.data.length; i++) {
                        $('#list-of-students').append('<tr class="student-'+ data.data.id +'">' +
                            '<td>'+ (i+1) +'</td>' +
                            '<td>' + data.data[i].surname + '</td>' +
                            '<td>' + data.data[i].name + '</td>' +
                            '<td>' + data.data[i].email + '</td>' +
                            '<td><button type="button" class="btn btn-danger btn-sm" onclick="groupUser('+ data.data[i].id +', 0)">Удалить</button></td>' +
                            '</tr>');
                    }
                }
            });
        }

        function groupUser(user_id, group_id) {
            $.ajax({
                url: "/api/group-user/"+ user_id,
                method: 'PUT',
                data: {
                    '_token'    : $('input[name="_token"]').val(),
                    'group_id'  : group_id
                },
                dataType: 'json',
                success: function (data) {
                    listOfStudentsInSelection();
                    listOfStudentsInTable();
                }
            });
        }
    </script>
@endsection
