@extends('frontend.layouts.master')
@section('title', __('front.Blog'))

@section('content')

    <main class="main">

        <!-- Page Title -->
        <div class="page-title dark-background">
            <div class="container">
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('Category') }}">@lang('back.Home')</a></li>
                        <li class="current">@lang('back.Blog Details')</li>
                    </ol>
                </nav>
                <h1>@lang('back.Blog Details')</h1>
            </div>
        </div><!-- End Page Title -->

        <div class="container">
            <div class="row">

                <div class="col-lg-8">

                    <!-- Blog Posts Section -->
                    <section id="blog-posts" class="blog-posts section">

                        <div class="container">

                            <div class="row gy-4">
                                @forelse ($posts as $Post)
                                    <div class="col-md-6 col-lg-4">
                                        <article>
                                            <div class="post-img">
                                                <img src="{{ asset($Post->image) }}" alt="@lang('back.Post Image')"
                                                    class="img-fluid">
                                            </div>

                                            <h2 class="title">
                                                <a href="#">
                                                    {{ app()->getLocale() === 'ar' ? $Post->title_ar : $Post->title_en }}
                                                </a>
                                            </h2>

                                            <div class="meta-top">
                                                <ul>
                                                    <li class="d-flex align-items-center">
                                                        <i class="bi bi-folder"></i>
                                                        <span>
                                                            {{ $Post->PostsCategory ? (app()->getLocale() === 'ar' ? $Post->PostsCategory->name_category_ar : $Post->PostsCategory->name_category_en) : (app()->getLocale() === 'ar' ? 'لا يوجد' : 'Not Assigned') }}
                                                        </span>
                                                    </li>
                                                    <li class="d-flex align-items-center">
                                                        <i class="bi bi-clock"></i>
                                                        <time datetime="{{ $Post->created_at }}">
                                                            {{ $Post->created_at->format('M d, Y') }}
                                                        </time>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="content">
                                                <p>
                                                    {{ Str::limit(app()->getLocale() === 'ar' ? $Post->content_ar : $Post->content_en, 100) }}
                                                </p>
                                                <div class="read-more">
                                                    <a href="#">{{ __('front.details') }}</a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <p class="text-center text-muted">@lang('back.No posts available')</p>
                                    </div>
                                @endforelse
                            </div>

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
                            <h3 class="widget-title">@lang('front.Search')</h3>
                            <form action="{{ route('search') }}" method="GET">
                                <input type="text" name="query" placeholder="@lang('front.Search')...">
                                <button type="submit" title="@lang('front.Search')"><i class="bi bi-search"></i></button>
                            </form>
                        </div><!-- /Search Widget -->

                        <!-- Categories Widget -->
                        <div class="categories-widget widget-item">
                            <h3 class="widget-title">@lang('front.Categories')</h3>
                            <ul class="mt-3">
                                @foreach ($postsCategory as $category)
                                    <li>
                                        <a href="{{ route('allPostsBelongCategory', $category->slug_category) }}">
                                            {{ app()->getLocale() == 'ar' ? $category->name_category_ar : $category->name_category_en }}
                                            <span>({{ $category->posts->count() }})</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div><!-- /Categories Widget -->

                        <!-- Recent Posts Widget -->
                        <div class="recent-posts-widget widget-item">
                            <h3 class="widget-title">@lang('front.Recent Posts')</h3>
                            @foreach ($recentPosts as $recent)
                                <div class="post-item">
                                    <img src="{{ asset($recent->image) }}" width="50px" height="50px" alt=""
                                        class="flex-shrink-0">
                                    <div>
                                        <h4>
                                            <a href="#">{{ $recent->title }}</a>
                                        </h4>
                                        <time datetime="{{ $recent->created_at }}">
                                            {{ $recent->created_at->format('M d, Y') }}
                                        </time>
                                    </div>
                                </div>
                            @endforeach
                        </div><!-- /Recent Posts Widget -->

                    </div>

                </div>
            </div>
        </div>

    </main>

@endsection
