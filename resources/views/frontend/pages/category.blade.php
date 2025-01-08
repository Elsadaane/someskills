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
                        <li class="current">Blog</li>
                    </ol>
                </nav>
                <h1>Blog</h1>
            </div>
        </div><!-- End Page Title -->

        <div class="container">
            <div class="row">

                <div class="col-lg-8">

                    <!-- Blog Posts Section -->
                    <section id="blog-posts" class="blog-posts section">

                        <div class="container">

                            <div class="row gy-4">
                                @foreach ($postsCategory as $category)
                                    <div class="col-12">
                                        <article>
                                            <div class="post-img">
                                                <img src="{{ asset($category->image) }}" alt="" class="img-fluid">
                                            </div>

                                            <h2 class="title">
                                                <a href="{{ route('allPostsBelongCategory', $category->slug_category) }}">
                                                    {{ app()->getLocale() == 'ar' ? $category->name_category_ar : $category->name_category_en }}
                                                </a>
                                            </h2>

                                            <div class="meta-top">
                                                <ul>
                                                    <li class="d-flex align-items-center">
                                                        <i class="bi bi-clock"></i>
                                                        <a href="#"><time
                                                                datetime="{{ $category->created_at }}">{{ $category->created_at->format('M d, Y') }}</time></a>
                                                    </li>
                                                    <li class="d-flex align-items-center">
                                                        <i class="bi bi-chat-dots"></i>
                                                        <a href="#">{{ $category->posts->count() }} Comments</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="content">
                                                <p>
                                                    {{ app()->getLocale() == 'ar' ? $category->description_category_ar : $category->description_category_en }}
                                                </p>

                                                <div class="read-more">
                                                    <a
                                                        href="{{ route('allPostsBelongCategory', $category->slug_category) }}">{{ __('front.details') }}</a>
                                                </div>
                                            </div>
                                        </article>
                                    </div><!-- End post list item -->
                                @endforeach
                            </div><!-- End blog posts list -->

                        </div>

                    </section><!-- /Blog Posts Section -->

                    <!-- Blog Pagination Section -->
                    <section id="blog-pagination" class="blog-pagination section">

                        <div class="container">
                            <div class="d-flex justify-content-center">
                                <ul>
                                    {{ $postsCategory->links() }}
                                </ul>
                            </div>
                        </div>

                    </section><!-- /Blog Pagination Section -->

                </div>

                <div class="col-lg-4 sidebar">

                    <div class="widgets-container">

                        <!-- Search Widget -->
                        <div class="search-widget widget-item">
                            <h3 class="widget-title">Search</h3>
                            <form action="{{ route('search') }}" method="GET">
                                <input type="text" name="query" placeholder="Search...">
                                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                            </form>

                        </div><!-- /Search Widget -->

                        <!-- Categories Widget -->
                        <div class="categories-widget widget-item">

                            <h3 class="widget-title">Categories</h3>
                            <ul class="mt-3">
                                @foreach ($postsCategory as $category)
                                    <li><a href="{{ route('allPostsBelongCategory', $category->slug_category) }}">
                                            {{ app()->getLocale() == 'ar' ? $category->name_category_ar : $category->name_category_en }}
                                            <span>({{ $category->posts->count() }})</span></a></li>
                                @endforeach
                            </ul>

                        </div><!-- /Categories Widget -->

                        <!-- Recent Posts Widget -->
                        <div class="recent-posts-widget widget-item">

                            <h3 class="widget-title">Recent Posts</h3>

                            @foreach ($recentPosts as $recent)
                                <div class="post-item">
                                    <img src="{{ asset($recent->image) }}" alt="" class="flex-shrink-0">
                                    <div>
                                        <h4><a
                                                href="{{ route('allPostsBelongCategory', $category->slug_category) }}">{{ $recent->title }}</a>
                                        </h4>
                                        <time
                                            datetime="{{ $recent->created_at }}">{{ $recent->created_at->format('M d, Y') }}</time>
                                    </div>
                                </div><!-- End recent post item -->
                            @endforeach

                        </div><!-- /Recent Posts Widget -->

                        {{-- <!-- Tags Widget -->
                        <div class="tags-widget widget-item">

                            <h3 class="widget-title">Tags</h3>
                            {{-- <ul>
                                @foreach ($Tags as $tag)
                                    <li><a href="{{ route('tag', ['id' => $tag->id]) }}">{{ $tag->name }}</a></li>
                                @endforeach
                            </ul> --}}

                        {{-- </div><!-- /Tags Widget --> --}}

                    </div>

                </div>
            </div>
        </div>

    </main>

@endsection
