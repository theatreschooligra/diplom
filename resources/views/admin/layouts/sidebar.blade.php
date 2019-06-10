<div class="sidebar" id="sidebar"> <!-- sidebar -->
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"></li>
                <li>
                    <a href="/admin"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('admin.company.index') }}" style="width: 80%; display: inline-block;"><i class="fa fa-info" aria-hidden="true"></i>Информация школы</a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <span>Пользователи</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('admin.user.index', ['role' => '1']) }}">Админ</a></li>
                        <li><a href="{{ route('admin.user.index', ['role' => '2']) }}">Преподаватели</a></li>
                        <li><a href="{{ route('admin.user.index', ['role' => '3']) }}">Ученики</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.group.index') }}" style="width: 80%; display: inline-block;"><i class="fa fa-users" aria-hidden="true"></i>Группа</a>
                </li>
                <li>
                    <a href="{{ route('admin.homework.index') }}" style="width: 80%; display: inline-block;"><i class="fa fa-graduation-cap" aria-hidden="true"></i>Домашное задание</a>
                </li>
                <li>
                    <a href="{{ route('admin.lesson.index') }}" style="width: 80%; display: inline-block;"><i class="fa fa-graduation-cap" aria-hidden="true"></i>Занятия</a>
                </li>
                <li>
                    <a href="{{ route('admin.repertoire.index') }}" style="width: 80%; display: inline-block;"><i class="fa fa-graduation-cap" aria-hidden="true"></i>Репертуары</a>
                </li>
                <li>
                    <a href="{{ route('admin.course.index') }}" style="width: 80%; display: inline-block;"><i class="fa fa-graduation-cap" aria-hidden="true"></i>Курсы</a>
                </li>
            </ul>
        </div>
    </div>
</div>
