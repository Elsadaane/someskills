<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto w-50">
            <img src="{{ asset($setting->logo) }}" alt="">
        </a>

        @include('frontend.layouts.nav')

        <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-bs-toggle="dropdown">
            @if (App::getLocale() == 'ar')
                {{ LaravelLocalization::getCurrentLocaleName() }}
                <img src="{{ URL::asset('backend/assets/images/flags/OM.png') }}" alt="">
            @else
                {{ LaravelLocalization::getCurrentLocaleName() }}
                <img src="{{ URL::asset('backend/assets/images/flags/US.png') }}" alt="">
            @endif
        </button>
        <div class="dropdown-menu">
            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    {{ $properties['native'] }}
                </a>
            @endforeach
        </div>

        <div class="ms-auto d-flex align-items-center">
            @if (Auth::guard('writer')->check())
                <a href="{{ route('writer.index') }}" class="btn btn-primary btn-sm me-2">صفحتي</a>

                <form action="{{ route('writer-logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">تسجيل الخروج</button>
                </form>
            @else
                <a href="{{ route('writer-login-page') }}" class="btn btn-success btn-sm">الدخول</a>
            @endif
        </div>
    </div>
</header>
