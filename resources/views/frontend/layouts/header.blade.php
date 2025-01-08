<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto w-50 ">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{ asset('logo.png') }}" alt="">

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

    </div>
</header>
