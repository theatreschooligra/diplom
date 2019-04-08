<!DOCTYPE html>
<html>

    <head>
        @include('admin.layouts.head');
    </head>

    <body>
        <div id="app" class="main-wrapper">

            @include('admin.layouts.header')

            @include('admin.layouts.sidebar')


            @yield('content')


        </div>
    <div class="sidebar-overlay" data-reff=""></div>

    @include('admin.layouts.footer')

    </body>

</html>
