@extends('frontend.layouts.master')
@section('title', __('back.about_ar'))
@section('content')

    <main class="main">

        <!-- Page Title -->
        <div class="page-title gradient-background text-white">
            <div class="container text-center">
                <nav class="breadcrumbs d-flex justify-content-center mb-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('Category') }}" class="text-light">@lang('back.Home')</a>
                        </li>
                        <li class="breadcrumb-item active">@lang('back.about_ar')</li>
                    </ol>
                </nav>
                <h1 class="fw-bold display-5">@lang('back.about_ar')</h1>
            </div>
        </div>
        <!-- End Page Title -->

        <div class="container py-5">
            <div class="row align-items-center justify-content-between">
                <!-- Company Image -->
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <div class="image-container position-relative rounded overflow-hidden shadow-lg">
                        <img src="{{ asset($About->image) }}" class="img-fluid" alt="@lang('back.Company_Image')">
                        <div
                            class="image-overlay position-absolute w-100 h-100 top-0 start-0 bg-dark bg-opacity-50 d-flex justify-content-center align-items-center text-white">
                            <span class="fw-bold">@lang('back.Our Journey')</span>
                        </div>
                    </div>
                </div>

                <!-- Company Details -->
                <div class="col-lg-6">
                    <!-- Company Name -->
                    <h2 class="display-6 text-primary fw-bold mb-3">
                        {{ app()->getLocale() === 'ar' ? $About->company_ar : $About->company_en }}
                    </h2>

                    <!-- Who Are We -->
                    <div class="mb-4">
                        <h4 class="text-secondary fw-semibold">@lang('back.who_are_we')</h4>
                        <p class="text-muted fs-5">
                            {{ app()->getLocale() === 'ar' ? $About->who_are_we_ar : $About->who_are_we_en }}
                        </p>
                    </div>

                    <!-- Company Content -->
                    <div>
                        <h4 class="text-secondary fw-semibold">@lang('back.Our Story')</h4>
                        <p class="text-muted fs-5">
                            {{ app()->getLocale() === 'ar' ? $About->contant_ar : $About->contant_en }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Section: Mission and Vision -->
        <div class="container py-5">
            <div class="row text-center">
                <div class="col-lg-6 mb-4">
                    <div class="p-4 shadow rounded bg-light h-100">
                        <h5 class="text-primary fw-bold">@lang('back.our_digital_services')</h5>
                        <p class="text-muted mt-2">
                            {{ app()->getLocale() === 'ar' ? 'رسالتنا هي تحقيق التميز...' : 'Our mission is to achieve excellence...' }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="p-4 shadow rounded bg-light h-100">
                        <h5 class="text-primary fw-bold">@lang('back.about_ar')</h5>
                        <p class="text-muted mt-2">
                            {{ app()->getLocale() === 'ar' ? 'رؤيتنا هي المستقبل...' : 'Our vision is the future...' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
