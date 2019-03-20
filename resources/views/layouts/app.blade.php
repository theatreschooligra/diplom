<!DOCTYPE html>
<html>

    <head>
        @include('layouts.head');
    </head>

    <body>
        <div id="app" class="main-wrapper">

            @include('layouts.header')

            @include('layouts.sidebar')


            @yield('content')


        </div>
    <div class="sidebar-overlay" data-reff=""></div>

    @include('layouts.footer')

    </body>

</html>