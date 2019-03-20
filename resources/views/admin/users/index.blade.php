@extends('layouts.app')

@section('head-content')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                    <a href="{{ route('admin.users.create', ['role' => $role->id]) }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus">Добавить пользователя</i></a>
                    <div class="view-icons">
                        <a href="{{ route('admin.users.index', ['view' => 2, 'role' => $role->id]) }}" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
                        <a href="{{ route('admin.users.index', ['view' => 1, 'role' => $role->id]) }}" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
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
                                    <th style="width:20%;">Имя </th>
                                    <th>Email</th>
                                    @if ($role->id == 3)
                                        <th>Имя родителя</th>
                                        <th>Группа</th>
                                    @endif
                                    <th>Пол</th>
                                    <th>Адрес</th>
                                    <th>День рождение</th>
                                    <th>Телефонный номер</th>
                                    <th class="text-right" style="width:15%;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                <a href="profile.html" class="avatar">
                                                    {!! ($user->fields->image == null) ? $user->fields->name[0] : '<img src="'. asset('img/'. $user->fields->image) .'">' !!}
                                                </a>
                                                <h2><a href="profile.html">{{ $user->fields->surname .' '. $user->fields->name }}<span></span></a></h2>
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            @if ($role->id != null)
                                                <td>{{ $user->fields->parent_surname .' '. $user->fields->parent_name }}</td>
                                                <td>{{ ($user->fields->group_id != null) ? $user->group->name : ''}}</td>
                                            @endif
                                            <td>{{ $user->getGender() }}</td>
                                            <td>{{ $user->fields->address }}</td>
                                            <td>{{ (\Carbon\Carbon::createFromFormat('Y-m-d', $user->fields->birthday))->format('d/m/Y') }}</td>
                                            <td>{{ $user->fields->mobile }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-sm mb-1">
                                                    Edit
                                                </a>
                                                <button type="submit" data-toggle="modal" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1">
                                                    Delete
                                                </button>
                                            </td>
                                            <div id="delete_employee" class="modal" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content modal-md">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Удалить пользователя</h4>
                                                        </div>
                                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                                                            {{ method_field('DELETE') }}
                                                            <div class="modal-body card-box">
                                                                <p>Вы точно хотите удалить {{ $user->fields->surname .' '. $user->fields->name }}</p>
                                                                <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Закрыть</a>
                                                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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
    <script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
