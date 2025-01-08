@extends('frontend.layouts.master')

@section('content')
    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section">
            <img src="{{ asset($hero->image) }}" alt="" data-aos="fade-in">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h2 data-aos="fade-up" data-aos-delay="100">
                            {{ app()->getLocale() == 'ar' ? $hero->title_ar : $hero->title_en }}</h2>
                        <p data-aos="fade-up" data-aos-delay="200">
                            {{ app()->getLocale() == 'ar' ? $hero->subtitle_ar : $hero->subtitle_en }}</p>
                        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                            <a href="{{ $hero->link }}" class="btn-get-started">Get Started</a>
                            <a href="{{ asset($hero->video) }}" class="glightbox btn-watch-video d-flex align-items-center">
                                <i class="bi bi-play-circle"></i><span>Watch Video</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Hero Section -->

        <!-- Clients Section -->
        <section id="clients" class="clients section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                        {
                            "loop": true,
                            "speed": 600,
                            "autoplay": {
                                "delay": 5000
                            },
                            "slidesPerView": "auto",
                            "pagination": {
                                "el": ".swiper-pagination",
                                "type": "bullets",
                                "clickable": true
                            },
                            "breakpoints": {
                                "320": {
                                    "slidesPerView": 2,
                                    "spaceBetween": 40
                                },
                                "480": {
                                    "slidesPerView": 3,
                                    "spaceBetween": 60
                                },
                                "640": {
                                    "slidesPerView": 4,
                                    "spaceBetween": 80
                                },
                                "992": {
                                    "slidesPerView": 6,
                                    "spaceBetween": 120
                                }
                            }
                        }
                    </script>
                    <div class="swiper-wrapper align-items-center">
                        @for ($i = 1; $i <= 8; $i++)
                            <div class="swiper-slide">
                                <img src="{{ asset('frontend/assets/img/clients/client-' . $i . '.png') }}"
                                    class="img-fluid" alt="">
                            </div>
                        @endfor
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section><!-- /Clients Section -->

        <!-- About Section -->


        <section id="about" class="about section section-bg dark-background">
            <div class="container position-relative">
                <div class="row gy-5">
                    <div class="content col-xl-5 d-flex flex-column" data-aos="fade-up" data-aos-delay="100">
                        <h3>{{ app()->getLocale() == 'ar' ? $about->company_ar : $about->company_en }}</h3>
                        <p>
                            {{ app()->getLocale() == 'ar' ? $about->who_are_we_ar : $about->who_are_we_er }}
                        </p>
                        <a href="#" class="about-btn align-self-center align-self-xl-start">
                            <span>contant</span> <i class="bi bi-chevron-right"></i>
                        </a>
                    </div>
                    <div class="col-xl-7" data-aos="fade-up" data-aos-delay="200">
                        <div class="row gy-4">
                            @foreach ([['icon' => 'bi-briefcase', 'title' => 'Corporis voluptates sit', 'description' => 'Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip'], ['icon' => 'bi-gem', 'title' => 'Ullamco laboris nisi', 'description' => 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt'], ['icon' => 'bi-broadcast', 'title' => 'Labore consequatur', 'description' => 'Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere'], ['icon' => 'bi-easel', 'title' => 'Beatae veritatis', 'description' => 'Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta']] as $item)
                                <div class="col-md-6 icon-box position-relative">
                                    <i class="bi {{ $item['icon'] }}"></i>
                                    <h4><a href="" class="stretched-link">{{ $item['title'] }}</a></h4>
                                    <p>{{ $item['description'] }}</p>
                                </div><!-- Icon-Box -->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /About Section -->

        <!-- Portfolio Section -->
        <section id="portfolio" class="portfolio section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Categories</h2>
                <p>Some Category</p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">All</li>
                        @foreach ($PostsCategory as $Category)
                            <li
                                data-filter=".filter-{{ app()->getLocale() == 'ar' ? $Category->name_category_ar : $Category->name_category_en }}">
                                {{ app()->getLocale() == 'ar' ? $Category->name_category_ar : $Category->name_category_en }}
                            </li>
                        @endforeach

                    </ul><!-- End Portfolio Filters -->


                    {{-- glightbox
                    to make one bage --}}


                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($PostsCategory as $Category)
                            <div
                                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ app()->getLocale() == 'ar' ? $Category->name_category_ar : $Category->name_category_en }}">
                                <div class="portfolio-content h-100">
                                    <img src="{{ asset($Category->image) }}" class="img-fluid" alt="">
                                    <div class="portfolio-info">
                                        <h4>{{ app()->getLocale() == 'ar' ? $Category->name_category_ar : $Category->name_category_en }}
                                        </h4>
                                        <p>{{ app()->getLocale() == 'ar' ? $Category->description_category_ar : $Category->description_category_en }}
                                        </p>
                                        <a href="{{ asset($Category->image) }}" title="App 1"
                                            data-gallery="portfolio-gallery-app" class="glightbox preview-link">
                                            <i class="bi bi-zoom-in"></i>
                                        </a>
                                        <a href="{{ route('allPostsBelongCategory', $Category->slug_category) }}"
                                            title="More Details" class="details-link">
                                            <i class="bi bi-link-45deg"></i>
                                        </a>
                                    </div>
                                </div>
                            </div><!-- End Portfolio Item -->
                        @endforeach
                    </div>
                    <div class="text-center my-link-container mt-2">
                        <a class="glightbox preview-link stylish-link button-link " href="{{ route('Category') }}">
                            {{ __('front.allCategory') }}
                        </a>
                    </div>

                </div>
            </div>
        </section><!-- /Portfolio Section -->
    </main>
@endsection
