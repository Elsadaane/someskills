<!-- Top Navigation -->
<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    <!-- Dashboard Link -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}" id="topnav-dashboard">
                            <i class="mdi mdi-view-dashboard me-1"></i> {{ __('back.dashboard') }}
                        </a>
                    </li>

                    <!-- Settings Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="topnav-layout" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cog"></i> {{ __('back.setting') }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-layout">
                            <a href="{{ route('setting.index') }}" class="dropdown-item">{{ __('back.setting') }}</a>
                            <a href="{{ route('About.index') }}" class="dropdown-item">{{ __('back.about_us') }}</a>
                            <a href="{{ route('hero.index') }}" class="dropdown-item">{{ __('back.hero') }}</a>
                            <a href="{{ route('tag.add') }}" class="dropdown-item">hashtag</a>
                            <a href="{{ route('Contact_us.index') }}"
                                class="dropdown-item">{{ __('back.contact_us') }}</a>
                        </div>
                    </li>
                    <!-- Blog Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="topnav-layout" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-blog"></i> {{ __('back.blog') }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-layout">
                            <a href="{{ route('category.index') }}"
                                class="dropdown-item">{{ __('back.Blog_sections') }}</a>
                            <a href="{{ route('posts.index') }}" class="dropdown-item">{{ __('back.All_blogs') }}</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="topnav-layout" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-shopping-cart"></i>{{ __('back.catogry') }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-layout">
                            <a href="{{ route('CategoryOfProduct.index') }}"
                                class="dropdown-item">{{ __('back.catogry') }}</a>
                            <a href="{{ route('Product.index') }}" class="dropdown-item">{{ __('back.product') }}</a>
                        </div>
                    </li>
                </ul>
            </div> <!-- End collapse -->
        </nav>
    </div> <!-- End container-fluid -->
</div> <!-- End topnav -->
