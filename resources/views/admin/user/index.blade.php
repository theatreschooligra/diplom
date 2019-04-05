@extends('layouts.app')

@section('head-content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        table td, th {
            min-width: 110px;
        }
        .column-search {
            font-size: 15px;
        }
    </style>
@endsection


@section('content')
    <div class="page-wrapper"> <!-- content -->
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                        <h5 class="text-uppercase">students List</h5>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                        <ul class="list-inline breadcrumb float-right">
                            <li class="list-inline-item"><a href="/admin">Главная</a></li>
                            <li class="list-inline-item">
                                @if ($role->id == 2)
                                    Преподователь
                                @elseif ($role->id == 3)
                                    Ученик
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-3">

                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="{{ route('admin.user.create', ['role' => $role->id]) }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus">Добавить пользователя</i></a>
                    <div class="view-icons">
                        <a href="{{ route('admin.user.index', ['view' => 2, 'role' => $role->id]) }}" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
                        <a href="{{ route('admin.user.index', ['view' => 1, 'role' => $role->id]) }}" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
            </div>
            <div class="content-page">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable" id="example">
                                <thead>
                                    <tr>
                                        <th style="width:15%;">Имя </th>
                                        <th>Email</th>
                                        @if ($role->id == 3)
                                            <th style="width:15%;">Имя родителя</th>
                                            <th>Группа</th>
                                        @endif
                                        <th>Пол</th>
                                        <th>Адрес</th>
                                        <th>День рождение</th>
                                        <th>Телефонный номер</th>
                                        <th class="text-right" style="width:13%;">Action</th>
                                    </tr>
                                    <tr>
                                        <td><input id="name_search" class="form-control column-search"></td>
                                        <td><input id="email_search" class="form-control column-search"></td>
                                        <td><input id="parent_name_search" class="form-control column-search"></td>
                                        <td>
                                            <select id="group_search" class="form-control column-search">
                                                <option selected value="0">Выбрать...</option>
                                                @foreach(Dict::groups() as $group)
                                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select id="gender_search" class="form-control column-search">
                                                <option value="" selected="selected">Выбрать...</option>
                                                <option value="1">Парень</option>
                                                <option value="0">Девушка</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input id="address_search" class="form-control column-search">
                                        </td>
                                        <td>
                                            <input id="birthday_from_search" class="form-control column-search datetimepicker" placeholder="с">
                                            <input id="birthday_to_search" class="form-control column-search datetimepicker" placeholder="по">
                                        </td>
                                        <td>
                                            <input id="phone_number_search" class="form-control column-search">
                                        </td>
                                        <td class="text-right">
                                            <button type="submit" onclick="ResetSearchFields()">Сбросить</button>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody id="list-of-users">
                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                <a href="#" class="avatar">
                                                    {!! ($user->fields->image == null) ? $user->fields->name[0] : '<img src="'. asset('img/'. $user->fields->image) .'">' !!}
                                                </a>
                                                <h2><a href="#">{{ $user->fields->surname .' '. $user->fields->name }}<span></span></a></h2>
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            @if ($role->id != null)
                                                <td>{{ $user->fields->parent_surname .' '. $user->fields->parent_name }}</td>
                                                <td>{{ ($user->fields->group_id != null) ? $user->group->name : ''}}</td>
                                            @endif
                                            <td>{{ $user->getGender() }}</td>
                                            <td>{{ $user->fields->address }}</td>
                                            <td>{{ (\Carbon\Carbon::createFromFormat('Y-m-d', $user->fields->birthday))->format('d/m/Y') }}</td>
                                            <td>{{ $user->fields->phone_number }}</td>
                                            <td class="text-right">
                                                <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary btn-sm mb-1">
                                                        Редактировать
                                                    </a>
                                                    <button type="submit" class="btn btn-danger btn-sm mb-1">
                                                        Удалить
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer-content')
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable({
                "pagingType"    : "first_last_numbers",
                "searching"     : false,
                "stateSave"     : true,
                "scrollX"       : true,
                "orderCellsTop" : true
            });
            $('#phone_number_search').mask('0 (000) 000 00-00');

            $('.column-search').on('change', function () {
                search();
            });
        });

        function ResetSearchFields() {
            $('#name_search').val('');
            $('#email_search').val('');
            $('#parent_name_search').val('');
            $('#group_search').val('0');
            $("#gender_search").val('');
            $('#address_search').val('');
            $('#birthday_from_search').val('');
            $('#birthday_to_search').val('');
            $('#phone_number_search').val('');

            search();
        }

        function search() {
            $.ajax({
                url: "{{ route('admin.search.users') }}",
                method: 'POST',
                dataType: 'json',
                data: {
                    '_token'        : $('input[name="_token"]').val(),
                    'name'          : $('#name_search').val(),
                    'email'         : $('#email_search').val(),
                    'parent_name'   : $('#parent_name_search').val(),
                    'group_id'      : $('#group_search').val(),
                    'gender'        : $('#gender_search').val(),
                    'birthday_from' : $('#birthday_from_search').val(),
                    'birthday_to'   : $('#birthday_to_search').val(),
                    'phone_number'  : $('#phone_number_search').val()
                },
                success: function (data) {
                    $('#list-of-users').html('');
                    for (var i = 0; i < data.length; i++) {
                        var img = data[i].student.name[0];
                        if (data[i].student.image != null)
                            img = '<img src="/img/'+ data[i].student.image +'">';
                        $('#list-of-users').append('<tr>' +
                            '<td>' +
                            '<a href="#" class="avatar">'+ img +'</a>' +
                            '<h2>' +
                            '<a href="#">'+ data[i].student.surname +' '+ data[i].student.name +'<span></span></a>' +
                            '</h2>' +
                            '</td>' +
                            '<td>'+ data[i].email +'</td>' +
                            '<td>'+ data[i].student.parent_surname +' '+ data[i].student.parent_name +'</td>' +
                            '<td>'+ (data[i].student.group == null) ? '' : data[i].student.group.name +'</td>' +
                            '<td>'+ (data[i].student.gender) ? 'Male' : 'Female' +'</td>' +
                            '<td>'+ data[i].student.address +'</td>' +
                            '<td>{{ (\Carbon\Carbon::createFromFormat('Y-m-d', $user->fields->birthday))->format('d/m/Y') }}</td>' +
                            '<td>'+ data[i].student.phone_number +'</td>' +
                            '<td class="text-right">' +
                            '<form action="/admin/user/'+ data[i].id +'" method="POST">' +
                            '{{ csrf_field() }}' +
                            '{{ method_field('DELETE') }}' +
                            '<a href="/admin/user/'+ data[i].id +'/edit" class="btn btn-primary btn-sm mb-1">' +
                            'Редактировать' +
                            '</a>' +
                            '<button type="submit" class="btn btn-danger btn-sm mb-1">' +
                            'Удалить' +
                            '</button>' +
                            '</form>' +
                            '</td>' +
                            '</tr>');
                    }
                }, error: function (data) {
                    console.log(data.toString());
                }
            });
        }
    </script>
@endsection
