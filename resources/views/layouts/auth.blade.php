<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" class="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>
    
    @include('layouts.partials._head')

</head>

<body class="bg-white dark:!bg-bodybg">
    <!-- Loader -->
    <div id="loader" >
        <img src="{{ asset('eofficeadmin/images/media/loader.svg') }}" alt="">
    </div>
    <!-- Loader -->

    <div class="grid grid-cols-12 authentication mx-0 text-defaulttextcolor text-defaultsize">

        @yield('content')

    </div>

    @include('layouts.partials._javascript')

</body>

</html>