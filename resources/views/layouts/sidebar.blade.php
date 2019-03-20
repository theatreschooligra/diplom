<div class="sidebar" id="sidebar"> <!-- sidebar -->
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>
                <li>
                    <a href="/admin"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <span> Пользователи</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('admin.users.index', ['role' => '1']) }}">Админ</a></li>
                        <li><a href="{{ route('admin.users.index', ['role' => '2']) }}">Преподаватели</a></li>
                        <li><a href="{{ route('admin.users.index', ['role' => '3']) }}">Ученики</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.groups.index') }}" style="width: 80%; display: inline-block;"><i class="fa fa-calendar" aria-hidden="true"></i> Группа</a>
                </li>
                {{--<li>
                    <a href="calendar.html" style="width: 80%; display: inline-block;"><i class="fa fa-calendar" aria-hidden="true"></i> Calendar</a>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="fa fa-share-alt" aria-hidden="true"></i> <span>Apps</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Email</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="compose.html"><span>Compose Mail</span></a></li>
                                <li>
                                    <a href="inbox.html"> <span> Inbox</span> </a>
                                </li>
                                <li><a href="mail-view.html"><span>Mailview</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="chat.html"> Chat <span class="badge badge-pill bg-primary float-right">5</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><span> Calls</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li><a href="voice-call.html">Voice Call</a></li>
                                <li><a href="video-call.html">Video Call</a></li>
                                <li><a href="incoming-call.html">Incoming Call</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="contacts.html"> Contacts</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="calendar.html" style="width: 80%; display: inline-block;"><i class="fa fa-calendar" aria-hidden="true"></i> Calendar</a>
                </li>


                <li class="submenu">
                    <a href="javascript:void(0);" class="noti-dot"><i class="fa fa-rocket" aria-hidden="true"></i> <span>Management </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="submenu">
                            <a href="#" class="noti-dot"><span> Employees</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li><a href="all-employees.html">All Employees</a></li>
                                <li><a href="holidays.html">Holidays</a></li>
                                <li><a href="leaves.html"><span>Leave Requests</span> <span class="badge badge-pill bg-primary float-right">1</span></a></li>
                                <li><a href="attendance.html">Attendance</a></li>
                                <li><a href="departments.html">Departments</a></li>
                                <li><a href="designations.html">Designations</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="activities.html">Activities</a>
                        </li>
                        <li>
                            <a  href="users.html">Users</a>
                        </li>
                        <li class="submenu">
                            <a href="#"><span> Reports </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li><a href="expense-reports.html"> Expense Report </a></li>
                                <li><a href="invoice-reports.html"> Invoice Report </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="settings.html"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a>
                </li>
                <li class="menu-title">UI Elements</li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-laptop" aria-hidden="true"></i> <span> Components</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="uikit.html">UI Kit</a></li>
                        <li><a href="typography.html">Typography</a></li>
                        <li><a href="tabs.html">Tabs</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-edit" aria-hidden="true"></i> <span> Forms</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="form-basic-inputs.html">Basic Inputs</a></li>
                        <li><a href="form-input-groups.html">Input Groups</a></li>
                        <li><a href="form-horizontal.html">Horizontal Form</a></li>
                        <li><a href="form-vertical.html">Vertical Form</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-table" aria-hidden="true"></i> <span> Tables</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="tables-basic.html">Basic Tables</a></li>
                        <li><a href="tables-datatables.html">Data Table</a></li>
                    </ul>
                </li>
                <li class="menu-title">Extras</li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-columns" aria-hidden="true"></i> <span>Pages</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="login.html"> Login </a></li>
                        <li><a href="register.html"> Register </a></li>
                        <li><a href="forgot-password.html"> Forgot Password </a></li>
                        <li><a href="change-password2.html"> Change Password </a></li>
                        <li><a href="lock-screen.html"> Lock Screen </a></li>
                        <li><a href="profile.html"> Profile </a></li>
                        <li><a href="gallery.html"> Gallery </a></li>
                        <li><a href="error-404.html">404 Error </a></li>
                        <li><a href="error-500.html">500 Error </a></li>
                        <li><a href="blank-page.html"> Blank Page </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="fa fa-share-alt" aria-hidden="true"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Level 1</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
                                    <ul class="list-unstyled" style="display: none;">
                                        <li><a href="javascript:void(0);">Level 3</a></li>
                                        <li><a href="javascript:void(0);">Level 3</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><span>Level 1</span></a>
                        </li>
                    </ul>
                </li>--}}
            </ul>
        </div>
    </div>
</div>