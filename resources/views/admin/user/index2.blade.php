@extends('layouts.app')

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
                    <a href="{{ route('admin.user.create', ['role' => $role->id, 'view' => '2']) }}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Добавить пользователя</a>
                    <div class="view-icons">
                        <a href="{{ route('admin.user.index', ['view' => 2, 'role' => $role->id]) }}" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                        <a href="{{ route('admin.user.index', ['view' => 1, 'role' => $role->id]) }}" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
            </div>
            <div class="content-page">
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group custom-mt-form-group">
                            <input type="text" id="name_search" class="column-search"/>
                            <label class="control-label">Имя</label><i class="bar"></i>
                        </div>
                    </div>
                    @if ($role->id == 3)
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group custom-mt-form-group">
                                <select id="group_search" class="column-search">
                                    <option value="0">Выбрать...</option>
                                    @foreach(Dict::groups() as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                                <label class="control-label">Группа</label><i class="bar"></i>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="row staff-grid-row" id="list-of-users">
                    @foreach($users as $user)
                        <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                            <div class="profile-widget">
                                <div class="profile-img">
                                    <a href="#" class="avatar">
                                        {!! ($user->fields->image == null) ? $user->fields->name[0] : '<img src="'. asset('img/'. $user->fields->image) .'">' !!}
                                    </a>
                                </div>
                                <div class="dropdown profile-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="view" value="2">
                                            <a class="dropdown-item" href="{{ route('admin.user.edit', ['id' => $user->id, 'view' => 2]) }}">
                                                <i class="fa fa-pencil m-r-5"></i> Редактировать</a>
                                            <button type="submit" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Удалить</button>
                                        </form>

                                    </div>
                                </div>
                                <h4 class="user-name m-t-10 m-b-0 text-ellipsis"><a href="#">{{ $user->fields->surname .' '. $user->fields->name }}</a></h4>
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

@section('footer-content')

    <script type="text/javascript">
        $(document).ready(function() {

            $('.column-search').on('change', function () {
                $.ajax({
                    url: "{{ route('admin.search.users') }}",
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        '_token'        : $('input[name="_token"]').val(),
                        'name'          : $('#name_search').val(),
                        'group_id'      : $('#group_search').val(),
                    },
                    success: function (data) {

                        $('#list-of-users').html('');
                        for (var i = 0; i < data.data.length; i++) {

                            var img = data.data[i].image;
                            if (data.data[i].image.length > 1)
                                img = '<img src="'+ data.data[i].image +'">';

                            var group = '';
                            if (data.data[i].role.id == 3 && data.data[i].group != null) {
                                group = '<div class="small text-muted">'+ data.data[i].group.name + '</div>';
                            }

                            $('#list-of-users').append('<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">' +
                                '<div class="profile-widget">' +
                                    '<div class="profile-img">' +
                                        '<a href="#" class="avatar">'+ img +'</a>' +
                                    '</div>' +
                                    '<div class="dropdown profile-action">' +
                                        '<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>' +
                                        '<div class="dropdown-menu dropdown-menu-right">' +
                                            '<form action="/admin/user/'+ data.data[i].id +'" method="POST">' +
                                                '@csrf' +
                                                '@method('DELETE')' +
                                                '<input type="hidden" name="view" value="2">' +
                                                '<a class="dropdown-item" href="/admin/user/'+ data.data[i].id +'/edit?view=2">' +
                                                '<i class="fa fa-pencil m-r-5"></i> Редактировать</a>' +
                                                '<button type="submit" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Удалить</button>' +
                                            '</form>' +
                                        '</div>' +
                                    '</div>' +
                                    '<h4 class="user-name m-t-10 m-b-0 text-ellipsis"><a href="#">'+ data.data[i].surname +' '+ data.data[i].name +'</a></h4>' +
                                    group +
                                '</div>' +
                                '</div>');
                        }
                    }, error: function (data) {
                        console.log(data.toString());
                    }
                });
            });
        });
    </script>
@endsection
