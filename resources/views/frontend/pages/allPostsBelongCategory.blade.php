@extends('frontend.layouts.master')
@section('title', __('front.Blog'))

@section('content')

    <main class="main">

        <!-- Page Title -->
        <div class="page-title dark-background">
            <div class="container">
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="current">{{ __('front.Blog') }}</li>
                    </ol>
                </nav>
                <h1>{{ __('front.Blog') }}</h1>
            </div>
        </div><!-- End Page Title -->

        <div class="container">
            <div class="row">

                <div class="col-lg-8">

                    <!-- Blog Posts Section -->
                    <section id="blog-posts" class="blog-posts section">

                        <div class="container">

                            <div class="row gy-4">
                                @foreach ($posts as $post)
                                    <div class="col-md-6">
                                        <article class="post-entry">
                                            <div class="post-img">
                                                <img src="{{ asset($post->image) }}" alt="Category Image" class="img-fluid">
                                            </div>

                                            <h2 class="title">
                                                {{-- <a href="{{ route('post.details', $post->slug) }}"> --}}
                                                {{ app()->getLocale() == 'ar' ? $post->title_ar : $post->title_en }}
                                                {{-- </a> --}}
                                            </h2>

                                            <div class="meta-top">
                                                <ul>
                                                    <li class="d-flex align-items-center">
                                                        <i class="bi bi-clock"></i>
                                                        <a href="#"><time
                                                                datetime="{{ $post->created_at }}">{{ $post->created_at->format('M d, Y') }}</time></a>
                                                    </li>
                                                    <li class="d-flex align-items-center">
                                                        <i class="bi bi-folder"></i>
                                                        <a href="{{ route('category-details', $post->category->slug) }}">
                                                            {{ app()->getLocale() == 'ar' ? $post->category->name_category_ar : $post->category->name_category_en }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="content">
                                                <p>
                                                    {{ app()->getLocale() == 'ar' ? $post->content_ar : $post->content_en }}
                                                </p>

                                                <div class="read-more">
                                                    {{-- <a
                                                        href="{{ route('post.details', $post->slug) }}"> --}}
                                                    {{ __('front.details') }}
                                                    {{-- </a> --}}
                                                </div>
                                            </div>
                                        </article>
                                    </div><!-- End post item -->
                                @endforeach
                            </div><!-- End blog posts list -->

                        </div>

                    </section><!-- /Blog Posts Section -->

                    <!-- Blog Pagination Section -->
                    <section id="blog-pagination" class="blog-pagination section">

                        <div class="container">
                            <div class="d-flex justify-content-center">
                                <ul>
                                    {{ $posts->links() }}
                                </ul>
                            </div>
                        </div>

                    </section><!-- /Blog Pagination Section -->

                </div>

                <div class="col-lg-4 sidebar">

                    <div class="widgets-container">

                        <!-- Search Widget -->
                        <div class="search-widget widget-item">
                            <h3 class="widget-title">{{ __('front.Search') }}</h3>
                            <form action="{{ route('search') }}" method="GET">
                                <input type="text" name="query" placeholder="{{ __('front.SearchPlaceholder') }}">
                                <button type="submit" title="{{ __('front.Search') }}"><i
                                        class="bi bi-search"></i></button>
                            </form>
                        </div><!-- /Search Widget -->

                        <!-- Categories Widget -->
                        <div class="categories-widget widget-item">
                            <h3 class="widget-title">{{ __('front.Categories') }}</h3>
                            <ul class="mt-3">
                                @foreach ($categories as $category)
                                    <li><a href="{{ route('category.posts', $category->slug) }}">
                                            {{ app()->getLocale() == 'ar' ? $category->name_category_ar : $category->name_category_en }}
                                            <span>({{ $category->posts_count }})</span></a></li>
                                @endforeach
                            </ul>
                        </div><!-- /Categories Widget -->

                        <!-- Recent Posts Widget -->
                        <div class="recent-posts-widget widget-item">
                            <h3 class="widget-title">{{ __('front.RecentPosts') }}</h3>
                            @foreach ($recentPosts as $recent)
                                <div class="post-item">
                                    <img src="{{ asset($recent->image) }}" alt="" class="flex-shrink-0">
                                    <div>
                                        <h4><a href="{{ route('post.details', $recent->slug) }}">{{ $recent->title }}</a>
                                        </h4>
                                        <time
                                            datetime="{{ $recent->created_at }}">{{ $recent->created_at->format('M d, Y') }}</time>
                                    </div>
                                </div><!-- End recent post item -->
                            @endforeach
                        </div><!-- /Recent Posts Widget -->

                    </div>

                </div>
            </div>
        </div>

    </main>

@endsection
