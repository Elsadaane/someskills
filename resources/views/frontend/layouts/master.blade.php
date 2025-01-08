<!DOCTYPE html>
<html lang="en">

@include('frontend.layouts.head')

<body class="index-page">
    <!-- Navigation-->
    @include('frontend.layouts.header')
    <!-- Page content-->
    {{-- <div class="container"> --}}
    @yield('content')
    {{-- </div> --}}

    @include('frontend.layouts.footer')
