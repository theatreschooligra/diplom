@extends('layouts.app')

@section('head-content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
    </style>
@endsection


@section('content')
    <div class="page-wrapper"> <!-- content -->
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                        <h5 class="text-uppercase">Группы</h5>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                        <ul class="list-inline breadcrumb float-right">
                            <li class="list-inline-item"><a href="/admin">Главная</a></li>
                            <li class="list-inline-item">Группы</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-3">

                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="{{ route('admin.group.create') }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus">Добавить группу</i></a>
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
                                    <th>Тип курса</th>
                                    <th>Количество учеников</th>
                                    <th class="text-right" style="width:15%;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($groups as $group)
                                        <tr>
                                            <td>
                                                <h2><a href="#">{{ $group->name }}<span></span></a></h2>
                                            </td>
                                            @if ($group->course_type == 1)
                                                <td>Коммуникативный курс</td>
                                            @elseif ($group->course_type == 2)
                                                <td>Актерский курс</td>
                                            @else
                                                <td>Спец. курс</td>
                                            @endif
                                            <td>{{ $group->studentsFields->count() }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('admin.group.edit', $group->id) }}" class="btn btn-primary btn-sm mb-1">
                                                    Редактировать
                                                </a>
                                                <button type="submit" data-toggle="modal" data-target="#delete_employee-{{ $group->id }}" class="btn btn-danger btn-sm mb-1">
                                                    Удалить
                                                </button>
                                            </td>
                                            <div id="delete_employee-{{ $group->id }}" class="modal" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content modal-md">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Удалить группу</h4>
                                                        </div>
                                                        <form action="{{ route('admin.group.destroy', $group->id) }}" method="post">
                                                            {{ method_field('DELETE') }}
                                                            <div class="modal-body card-box">
                                                                <p>Вы точно хотите удалить {{ $group->name  }}</p>
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
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "pagingType"    : "first_last_numbers",
                "searching"     : true,
                "stateSave"     : true,
            });
        });
    </script>
@endsection
