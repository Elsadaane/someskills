@extends('frontend.layouts.master')
@section('title', __('front.Products'))

@section('content')

    <main class="main">

        <!-- Page Title -->
        <div class="page-title dark-background">
            <div class="container">
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="current">Products</li>
                    </ol>
                </nav>
                <h1>Products</h1>
            </div>
        </div><!-- End Page Title -->

        <div class="container">
            <div class="row">

                <div class="col-lg-8">

                    <!-- Products Section -->
                    <section id="products" class="products section">

                        <div class="container">

                            <div class="row gy-4">
                                @foreach ($Category_Product as $category)
                                    <div class="col-12">
                                        <article>
                                            <div class="product-img">
                                                <img src="{{ asset($category->image) }}" alt="" class="img-fluid">
                                            </div>

                                            <h2 class="title">
                                                <a href="{{ route('category-details', $category->slug) }}">
                                                    {{ app()->getLocale() == 'ar' ? $category->name_ar : $category->name_en }}
                                                </a>
                                            </h2>

                                            <div class="meta-top">

                                            </div>

                                            <div class="content">
                                                <p>
                                                    {{ app()->getLocale() == 'ar' ? $category->Product_Description_ar : $category->Product_Description_en }}
                                                </p>

                                                <div class="read-more">
                                                    <a href="{{ route('category-details', $category->slug) }}">
                                                        {{ __('front.details') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </article>
                                    </div><!-- End product list item -->
                                @endforeach
                            </div><!-- End products list -->

                        </div>

                    </section><!-- /Products Section -->

                    <!-- Pagination Section -->
                    <section id="pagination" class="pagination section">

                        <div class="container">
                            <div class="d-flex justify-content-center">
                                <ul>
                                    {{ $Category_Product->links() }}
                                </ul>
                            </div>
                        </div>

                    </section><!-- /Pagination Section -->

                </div>

                <div class="col-lg-4 sidebar">

                    <div class="widgets-container">

                        <!-- Search Widget -->
                        <div class="search-widget widget-item">
                            <h3 class="widget-title">Search</h3>
                            <form action="{{ route('search-category') }}" method="GET">
                                <input type="text" name="query" placeholder="Search...">
                                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                            </form>

                        </div><!-- /Search Widget -->

                        <!-- Categories Widget -->
                        <div class="categories-widget widget-item">

                            <h3 class="widget-title">Categories</h3>
                            <ul class="mt-3">
                                @foreach ($Category_Product as $category)
                                    <li>
                                        <a href="{{ route('category-details', $category->slug) }}">
                                            {{ app()->getLocale() == 'ar' ? $category->name_ar : $category->name_en }}
                                            <span>({{ $category->products->count() }})</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                        </div><!-- /Categories Widget -->

                        <!-- Recent Products Widget -->
                        <div class="recent-products-widget widget-item">

                            <h3 class="widget-title">Recent Products</h3>

                            @foreach ($RecentProduct as $recent)
                                <div class="product-item">
                                    <img style="width: 50px;height: 50px;" src="{{ asset($recent->image) }}" alt=""
                                        class="flex-shrink-0">
                                    <div>
                                        <h4><a href="{{ route('category-details', $recent->slug) }}">
                                                {{ app()->getLocale() == 'ar' ? $recent->name_ar : $recent->name_en }}
                                            </a>
                                        </h4>
                                    </div>
                                </div><!-- End recent product item -->
                            @endforeach

                        </div><!-- /Recent Products Widget -->

                    </div>

                </div>
            </div>
        </div>

    </main>

@endsection
