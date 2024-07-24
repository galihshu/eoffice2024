<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'E-Office') }} - @yield('title')</title>
<meta name="description" content="">
<meta name="keywords" content="">

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('eofficeadmin/images/brand-logos/favicon.png') }}">

<!-- Main JS -->
<script src="{{ asset('eofficeadmin/js/main.js') }}"></script>

<!-- Style Css -->
<link rel="stylesheet" href="{{ asset('eofficeadmin/css/style.css') }}">

<!-- Simplebar Css -->
<link rel="stylesheet" href="{{ asset('eofficeadmin/libs/simplebar/simplebar.min.css') }}">

<!-- Color Picker Css -->
<link rel="stylesheet" href="{{ asset('eofficeadmin/libs/@simonwep/pickr/themes/nano.min.css') }}">

<!-- Tabulator Css -->
<link rel="stylesheet" href="{{ asset('eofficeadmin/libs/tabulator-tables/css/tabulator.min.css') }}">

<link rel="stylesheet" href="{{ asset('eofficeadmin/libs/gridjs/theme/mermaid.min.css') }}">

<!-- Choices Css -->
<link rel="stylesheet" href="{{ asset('eofficeadmin/libs/choices.js/public/assets/styles/choices.min.css') }}">

<link rel="stylesheet" href="https://cdn.datatables.net/2.1.0/css/dataTables.dataTables.css" />

{{-- <link rel="stylesheet" href="{{ asset('eofficeadmin/css/datatablestailwindcss.css') }}"> --}}
