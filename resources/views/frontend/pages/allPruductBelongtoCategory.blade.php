@extends('frontend.layouts.master')
@section('title', __('front.Products'))

@section('content')

    <main class="main">

        <!-- Page Title -->
        <div class="page-title dark-background">
            <div class="container">
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('home') }}">@lang('front.Home')</a></li>
                        <li class="current">@lang('front.Products')</li>
                    </ol>
                </nav>
                <h1>@lang('front.Products')</h1>
            </div>
        </div><!-- End Page Title -->

        <div class="container">
            <div class="row">

                <div class="col-lg-8">

                    <!-- Products Section -->
                    <section id="products" class="products section">

                        <div class="container">

                            <div class="row gy-4">
                                @foreach ($products as $product)
                                    <div class="col-md-6 col-lg-4">
                                        <article>
                                            <div class="product-img">
                                                <img src="{{ asset($product->image) }}" alt="@lang('front.Product Image')"
                                                    class="img-fluid">
                                            </div>

                                            <h2 class="title">
                                                <a href="#">
                                                    {{ app()->getLocale() == 'ar' ? $product->product_name_ar : $product->product_name_en }}
                                                </a>
                                            </h2>

                                            <div class="meta-top">
                                                <ul>
                                                    <li class="d-flex align-items-center">
                                                        <i class="bi bi-folder"></i>
                                                        <span>
                                                            {{ $product->category ? (app()->getLocale() == 'ar' ? $product->category->name_ar : $product->category->name_en) : __('front.No Category') }}
                                                        </span>
                                                    </li>
                                                    <li class="d-flex align-items-center">
                                                        <i class="bi bi-cash"></i>
                                                        <strong>@lang('front.Price'):</strong>
                                                        <del>{{ $product->Price_before_discount }}</del>
                                                        {{ $product->Price_after_discount }}
                                                    </li>
                                                    <li class="d-flex align-items-center">
                                                        <i class="bi bi-check-circle"></i>
                                                        <strong>@lang('front.Status'):</strong>
                                                        {{ $product->status == 1 ? __('front.Active') : __('front.Inactive') }}
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="content">
                                                <p>
                                                    {{ Str::limit(app()->getLocale() == 'ar' ? $product->Product_Description_ar : $product->Product_Description_en, 100) }}
                                                </p>
                                                <div class="read-more">
                                                    <a href="#">{{ __('front.details') }}</a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div><!-- End products list -->

                        </div>

                    </section><!-- /Products Section -->

                    <!-- Pagination Section -->
                    <section id="pagination" class="pagination section">

                        <div class="container">
                            <div class="d-flex justify-content-center">
                                <ul>
                                    {{ $products->links() }}
                                </ul>
                            </div>
                        </div>

                    </section><!-- /Pagination Section -->

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
                                @foreach ($products as $product)
                                    <li><a href="{{ route('category-details', $product->category->slug) }}">
                                            {{ app()->getLocale() == 'ar' ? $product->category->name_ar : $product->category->name_en }}
                                            <span>({{ $product->category->products->count() }})</span></a></li>
                                @endforeach
                            </ul>

                        </div><!-- /Categories Widget -->

                        <!-- Recent Products Widget -->
                        <div class="recent-products-widget widget-item">
                            <h3 class="widget-title">@lang('front.Recent Products')</h3>
                            @foreach ($recentProducts as $recent)
                                <div class="product-item">
                                    <img src="{{ asset($recent->image) }}" alt="" class="flex-shrink-0">
                                    <div>
                                        <h4>
                                            <a href="#">{{ $recent->product_name_en }}</a>
                                        </h4>
                                        <strong>@lang('front.Price'):</strong>
                                        {{ $recent->Price_after_discount }}
                                    </div>
                                </div>
                            @endforeach
                        </div><!-- /Recent Products Widget -->

                    </div>

                </div>
            </div>
        </div>

    </main>

@endsection
