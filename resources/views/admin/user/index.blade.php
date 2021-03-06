@extends('admin.layouts.app')

@section('head-content')
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
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
                        <h5 class="text-uppercase">Все пользователи</h5>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                        <ul class="list-inline breadcrumb float-right">
                            <li class="list-inline-item"><a href="{{ route('admin.home') }}">Главная</a></li>
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
                                            <th>Пробный</th>
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
                                        @if ($role->id == 3)
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
                                                <select id="trial_search" class="form-control column-search">
                                                    <option value="" selected="selected">Выбрать...</option>
                                                    <option value="1">Пробный</option>
                                                    <option value="0">Активный</option>
                                                </select>
                                            </td>
                                        @endif
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
                                            <input id="birthday_from_search" class="form-control column-search date_picker" placeholder="с" readonly>
                                            <input id="birthday_to_search" class="form-control column-search date_picker" placeholder="по" readonly>
                                        </td>
                                        <td>
                                            <input id="phone_number_search" class="form-control column-search">
                                        </td>
                                        <td class="text-right">
                                            <button type="submit" onclick="ResetSearchFields()" class="btn btn-primary reset-btn">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                                Сбросить</button>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody id="list-of-users">
                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                <a href="#" class="avatar">
                                                    {!! ($user->image == null) ? $user->surname[0] : '<img src="'. asset('img/'. $user->image) .'">' !!}
                                                </a>
                                                <h2><a href="#">{{ $user->surname .' '. $user->name }}<span></span></a></h2>
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            @if ($role->id == 3)
                                                <td>{{ ($user->fields->parent_surname == null) ? '' : $user->fields->parent_surname
                                                                    .' '.
                                                         ($user->fields->parent_name == null) ? '' : $user->fields->parent_name }}</td>
                                                <td>{{ ($user->fields->group_id != null) ? $user->group->name : ''}}</td>
                                                <td><input type="checkbox" data-id="{{ $user->id }}" {{ $user->student->is_trial ? 'checked' : 'disabled' }}></td>
                                            @endif
                                            <td>{{ $user->getGender() }}</td>
                                            <td>{{ ($user->address == null) ? '' : $user->address }}</td>
                                            <td>{{ ($user->birthday == null) ? '' : (\Carbon\Carbon::createFromFormat('Y-m-d', $user->birthday))->format('d/m/Y') }}</td>
                                            <td>{{ ($user->phone_number == null) ? '' : $user->phone_number }}</td>
                                            <td class="text-right">
                                                <form action="{{ route('admin.user.destroy', ['id' => $user->id, 'view' => 1]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('admin.user.edit', ['id' => $user->id, 'view' => 1]) }}" class="btn btn-primary btn-sm mb-1">
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
    <script type="text/javascript" src="{{ asset('bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bootstrap-datepicker/dist/locales/bootstrap-datepicker.ru.min.js') }}"></script>

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

            $('.date_picker').datepicker({
                format: 'dd.mm.yyyy',
                language: 'ru',
                autoclose: true,
                todayBtn: 'linked',
                position: "bottom-left",
                todayHighlight: true
            });

            $('input[type="checkbox"]').on('change', function () {
                id = $(this).data('id');
                $(this).attr("disabled", true);
                $.ajax({
                    url: "/admin/api/kpi",
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        '_token'        : $('input[name="_token"]').val(),
                        'user_id'       : id,
                    },
                    success: function (data) {

                    }, error: function (data) {
                        console.log(data.toString());
                    }
                });
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
            $('#trial_search').val('');

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
                    'is_trial'      : $('#trial_search').val(),
                    'group_id'      : $('#group_search').val(),
                    'gender'        : $('#gender_search').val(),
                    'birthday_from' : $('#birthday_from_search').val(),
                    'birthday_to'   : $('#birthday_to_search').val(),
                    'phone_number'  : $('#phone_number_search').val(),
                    'role_id'       : "{{ $role->id }}"
                },
                success: function (data) {

                    $('#list-of-users').html('');

                    for (var i = 0; i < data.data.length; i++) {

                        var img = data.data[i].surname[0];
                        var group = '';

                        if (data.data[i].image != null)
                            img = '<img src="'+ data.data[i].image +'">';

                        if (data.data[i].role.id == 3 && data.data[i].group != null) {
                            group = data.data[i].group.name;
                        }

                        var str = '<tr>' +
                            '<td>' +
                                '<a href="#" class="avatar">'+ img +'</a>' +
                                '<h2>' +
                                    '<a href="#">'+ data.data[i].surname +' '+ data.data[i].name +'<span></span></a>' +
                                '</h2>' +
                            '</td>' +
                            '<td>'+ data.data[i].email +'</td>';

                        if (data.data[i].role.id == 3)
                            str += '<td>'+ ((data.data[i].parent_surname == null) ? '' : data.data[i].parent_surname) +' '+
                                ((data.data[i].parent_name == null) ? '' : data.data[i].parent_name) +'</td><td>'+ group +'</td>' +
                                '<td><input type="checkbox" data-id="'+ data.data[i].id +'" '+ (data.data[i].is_trial ? 'checked' : 'disabled') + '></td>';

                        str += '<td>'+ ((data.data[i].gender) ? 'Парень' : 'Девушка') +'</td>' +
                            '<td>'+ ((data.data[i].address == null) ? "" : data.data[i].address) +'</td>' +
                            '<td>'+ ((data.data[i].birthday == null) ? "" : data.data[i].birthday) +'</td>' +
                            '<td>'+ ((data.data[i].phone_number == null) ? "" : data.data[i].phone_number) +'</td>' +
                            '<td class="text-right">' +
                            '<form action="/admin/user/'+ data.data[i].id +'" method="POST">' +
                            '{{ csrf_field() }}' +
                            '{{ method_field('DELETE') }}' +
                            '<a href="/admin/user/'+ data.data[i].id +'/edit" class="btn btn-primary btn-sm mb-1">' +
                            'Редактировать' +
                            '</a>' +
                            '<button type="submit" class="btn btn-danger btn-sm mb-1">' +
                            'Удалить' +
                            '</button>' +
                            '</form>' +
                            '</td>' +
                            '</tr>';

                        $('#list-of-users').append(str);
                    }
                }, error: function (data) {
                    console.log(data.toString());
                }
            });
        }
    </script>
@endsection
