<!DOCTYPE html>
<html lang="en" data-layout-mode="horizontal">

@include('backend.layouts.head')

<body>
    <div id="wrapper">
        @include('backend.layouts.header')
        @include('backend.layouts.nav')

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">@yield('PagesTitle')</h4>
                            </div>
                        </div>
                    </div>
                    @yield('content') <!-- محتوى الصفحة -->
                    <!-- end page title -->
                </div>
            </div>
        </div>
    </div>

    @include('backend.layouts.footer')
    @stack('js')
</body>

</html>
ss
