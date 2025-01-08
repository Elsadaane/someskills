<!-- Topbar Start -->
<div class="navbar-custom">
    <div class="container-fluid ps-0">
        <!-- Top Right Menu -->
        <ul class="list-unstyled topnav-menu float-end d-flex align-items-center mb-0 ">

            <!-- Language Switcher -->
            <li class="dropdown me-3">
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
            </li>


            <!-- Notifications -->
            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fe-bell noti-icon"></i>
                    <span class="badge bg-danger rounded-circle noti-icon-badge">9</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-lg">
                    <!-- Notification Title -->
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0">
                            <span class="float-end">
                                <a href="javascript:void(0);" class="text-dark">
                                    <small>Clear All</small>
                                </a>
                            </span>
                            Notifications
                        </h5>
                    </div>
                    <!-- Notification Items -->
                    <div class="noti-scroll" data-simplebar>
                        <a href="javascript:void(0);" class="dropdown-item notify-item active">
                            <div class="notify-icon">
                                <img src="{{ asset('backend/assets/images/users/user-1.jpg') }}"
                                    class="img-fluid rounded-circle" alt="" />
                            </div>
                            <p class="notify-details">Cristina Pride</p>
                            <p class="text-muted mb-0 user-msg">
                                <small>Hi, How are you? What about our next meeting</small>
                            </p>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-primary">
                                <i class="mdi mdi-comment-account-outline"></i>
                            </div>
                            <p class="notify-details">Caleb Flakelar commented on Admin
                                <small class="text-muted">1 min ago</small>
                            </p>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-secondary">
                                <i class="mdi mdi-heart"></i>
                            </div>
                            <p class="notify-details">Carlos Crouch liked
                                <b>Admin</b>
                                <small class="text-muted">13 days ago</small>
                            </p>
                        </a>
                    </div>
                    <!-- View All -->
                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                        View all
                        <i class="fe-arrow-right"></i>
                    </a>
                </div>
            </li>

            <!-- User Profile -->
            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown"
                    href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('backend/assets/images/users/user-1.jpg') }}" alt="user-image"
                        class="rounded-circle">
                    <span class="pro-user-name ms-1">
                        {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end profile-dropdown">
                    <!-- User Info -->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ Auth::user()->email }}</h6>
                    </div>
                    <!-- Account -->
                    <a href="{{ route('profile.edit') }}" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>{{ __('back.My_account') }}</span>
                    </a>
                    <!-- Logout -->
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-item notify-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 d-inline-flex align-items-center">
                                <i class="fe-log-out"></i>
                                <span>{{ __('back.logout') }}</span>
                            </button>
                        </form>
                    </div>
                </div>
            </li>
        </ul>

        <!-- Logo -->
        <div class="logo-box">
            <a href="index.html" class="logo logo-light text-center">
                <span class="logo-sm">
                    <img src="{{ asset('logo.png') }}" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('logo.png') }}" alt="" height="16">
                </span>
            </a>
            <a href="index.html" class="logo logo-dark text-center">
                <span class="logo-sm">
                    <img src="{{ asset('logo.png') }}" alt="" width="50" height="50">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('logo.png') }}" alt="" width="50" height="50">
                </span>
            </a>
        </div>

        <!-- Mobile Menu -->
        <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
            <li>
                <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </li>
        </ul>

        <div class="clearfix"></div>
    </div>
</div>
<!-- end Topbar -->
