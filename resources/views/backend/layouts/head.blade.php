<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('') }}">

    <!-- Theme Config JS -->
    <script src="{{ asset('backend/assets/js/config.js') }}"></script>

    <!-- Language Direction and Font -->
    @if (App::getLocale() == 'ar')
        <!-- RTL Base App CSS -->
        <link href="{{ asset('backend/assets/css/app-rtl.min.css') }}" rel="stylesheet" id="app-style" />
        {{-- <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400&display=swap" rel="stylesheet"> --}}
        <style>
            body {
                font-family: "Cairo", serif;
                direction: rtl;
            }
        </style>
    @else
        <!-- LTR Base App CSS -->
        <link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" id="app-style" />
        {{-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet"> --}}
        <style>
            body {
                font-family: "Cairo", serif;
                direction: ltr;
            }
        </style>
    @endif

    <!-- Icon CSS -->
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- DataTables CSS -->
    <link href="{{ asset('backend/assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend/assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend/assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend/assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />

    <!-- Plugin CSS -->
    <link href="{{ asset('backend/assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/libs/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/libs/multiselect/multi-select.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('backend/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/libs/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('backend/custom.css') }}" rel="stylesheet" type="text/css" />

    <!-- Stack for additional styles -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
</head>
