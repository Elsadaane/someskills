<nav id="navmenu" class="navmenu">
    <ul>
        <li><a href="{{ route('home') }}" class="active">{{ __('front.Home') }}<br></a></li>
        <!-- Language Switcher -->
        <li class="dropdown"><a href="#"><span>{{ __('back.post_categories') }}</span> <i
                    class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                <li><a href="{{ route('posts') }}">{{ __('front.AllPosts') }}</a></li>
                <li><a href="{{ route('Category') }}">{{ __('front.AllCategory') }}</a></li>
            </ul>
        </li>
        <li class="dropdown"><a href="#"><span>{{ __('back.category_product') }}</span> <i
                    class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                <li><a href="{{ route('product') }}">{{ __('back.all_products') }}</a></li>
                <li><a href="{{ route('product-Category') }}">{{ __('front.AllCategory') }}</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('about') }}">{{ __('back.about_ar') }}</a>
        </li>
        <li>
            <a href="{{ route('contact') }}">{{ __('back.contact_us') }}</a>
        </li>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>
