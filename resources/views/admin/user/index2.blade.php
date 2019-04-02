@extends('layouts.app')

@section('content')

    <div class="page-wrapper"> <!-- content -->
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                        <h5 class="text-uppercase">All Students</h5>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                        <ul class="list-inline breadcrumb float-right">
                            <li class="list-inline-item"><a href="/admin">Главная</a></li>
                            <li class="list-inline-item">
                                @if ($role->id == 2)
                                    Преподователь
                                @elseif ($role->id == 3)
                                    Ученик/Родитель
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
                    <a href="{{ route('admin.user.create', ['role' => $role->id]) }}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Student</a>
                    <div class="view-icons">
                        <a href="{{ route('admin.user.index', ['view' => 2, 'role' => $role->id]) }}" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                        <a href="{{ route('admin.user.index', ['view' => 1, 'role' => $role->id]) }}) }}" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
            </div>
            <div class="content-page">
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group custom-mt-form-group">
                            <input type="text"  />
                            <label class="control-label">Student Name</label><i class="bar"></i>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group custom-mt-form-group">
                            <select >
                                <option>Select class</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                            </select>
                            <label class="control-label">Class</label><i class="bar"></i>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <a href="#" class="btn btn-success btn-block mt-3 mb-2"> Search </a>
                    </div>
                </div>
                <div class="row staff-grid-row">
                    @foreach($users as $user)
                        <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                            <div class="profile-widget">
                                <div class="profile-img">
                                    <a href="student-profile.html" class="avatar">
                                        {!! ($user->fields->image == null) ? $user->fields->name[0] : '<img src="'. asset('img/'. $user->fields->image) .'">' !!}
                                    </a>
                                </div>
                                <div class="dropdown profile-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('admin.user.edit', $user->id) }}"><i class="fa fa-pencil m-r-5"></i> Редактировать</a>
                                        <a class="dropdown-item" href="{{ route('admin.user.destroy', $user->id) }}" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Удалить</a>
                                    </div>
                                    <div id="delete_employee" class="modal" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content modal-md">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Удалить пользователя</h4>
                                                </div>
                                                <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
                                                    {{ method_field('DELETE') }}
                                                    <div class="modal-body card-box">
                                                        <p>Вы точно хотите удалить {{ $user->fields->surname .' '. $user->fields->name }}</p>
                                                        <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Закрыть</a>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="user-name m-t-10 m-b-0 text-ellipsis"><a href="student-profile.html">{{ $user->fields->surname .' '. $user->fields->name }}</a></h4>
                                @if ($role->id == 3)
                                    <div class="small text-muted">{{ ($user->fields->group_id != null) ? $user->group->name : '' }}</div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


@endsection