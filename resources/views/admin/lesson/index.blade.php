@extends('admin.layouts.app')

@section('head-content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                            <li class="list-inline-item">Занятия</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-3">

                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="{{ route('admin.lesson.create') }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus">Добавить занятие</i></a>
                </div>
            </div>
            <div class="content-page">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable" id="example">
                                <thead>
                                <tr>
                                    <th>Имя </th>
                                    <th>Группа</th>
                                    <th>Преподаватель</th>
                                    <th>Зал</th>
                                    <th>День</th>
                                    <th>Время</th>
                                    <th class="text-right" style="width:15%;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($lessons as $lesson)
                                        <tr>
                                            <td>
                                                <h2>{{ $lesson->name }}</h2>
                                            </td>
                                            <td>{{ $lesson->group->name }}</td>
                                            <td>{{ $lesson->surname .' '. $lesson->name }}</td>
                                            <td>{{ (Dict::rooms())[$lesson->room] }}</td>
                                            <td>{{ (new \Carbon\Carbon($lesson->lesson_date))->format('d/m/Y') }}</td>
                                            <td>{{ (Dict::lesson_times())[$lesson->lesson_time]  }}</td>
                                            <td class="text-right">
                                                <form action="{{ route('admin.lesson.destroy', $lesson->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('admin.lesson.edit', $lesson->id) }}" class="btn btn-primary btn-sm mb-1">
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
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable({
                "pagingType"    : "first_last_numbers",
                "searching"     : false,
                "stateSave"     : true,
            });
        });
    </script>
@endsection
