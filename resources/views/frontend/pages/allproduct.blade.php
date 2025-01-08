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
                        <li class="current">{{ __('front.Products') }}</li>
                    </ol>
                </nav>
                <h1>{{ __('front.Products') }}</h1>
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
                                    <div class="col-md-6">
                                        <article class="product-entry">
                                            <div class="product-img position-relative">
                                                <img src="{{ asset($product->image) }}" alt="Product Image"
                                                    class="img-fluid">

                                                <!-- Status Badge -->
                                                @if ($product->status == 1)
                                                    <span
                                                        class="badge bg-success position-absolute top-0 start-0 m-2">{{ __('back.active') }}</span>
                                                @else
                                                    <span
                                                        class="badge bg-danger position-absolute top-0 start-0 m-2">{{ __('back.inactive') }}</span>
                                                @endif
                                            </div>

                                            <!-- Product Info -->
                                            <h2 class="title">
                                                {{ app()->getLocale() == 'ar' ? $product->product_name_ar : $product->product_name_en }}
                                            </h2>

                                            <!-- Category -->
                                            <div class="meta-top">
                                                <ul>
                                                    <li class="d-flex align-items-center">
                                                        <i class="bi bi-folder"></i>
                                                        @if ($product->category)
                                                            {{ app()->getLocale() == 'ar' ? $product->category->name_ar : $product->category->name_en }}
                                                        @else
                                                            {{ app()->getLocale() == 'ar' ? 'لا يوجد' : 'No Category' }}
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>

                                            <!-- Description -->
                                            <div class="content">
                                                <p>{{ app()->getLocale() == 'ar' ? $product->Product_Description_ar : $product->Product_Description_en }}
                                                </p>
                                            </div>

                                            <!-- Price Info -->
                                            <div class="price-info">
                                                <p><span class="text-muted">{{ __('back.Price_before_discount') }}:</span>
                                                    <span
                                                        class="text-danger text-decoration-line-through">${{ $product->Price_before_discount }}</span>
                                                </p>
                                                <p><span class="text-muted">{{ __('back.Price_after_discount') }}:</span>
                                                    <span class="text-success">${{ $product->Price_after_discount }}</span>
                                                </p>
                                            </div>

                                            <!-- WhatsApp Button -->
                                            <div class="read-more">
                                                <a href="https://wa.me/{{ $whatsapp_number }}?text={{ urlencode(__('back.product') . ': ' . (app()->getLocale() == 'ar' ? $product->product_name_ar : $product->product_name_en) . '\n' . __('back.Price') . ': ' . $product->Price_after_discount . ' ' . __('back.Currency') . '\n' . __('back.Description') . ': ' . (app()->getLocale() == 'ar' ? $product->Product_Description_ar : $product->Product_Description_en) . '\n' . __('back.Link') . ': ' . url()->current()) }}"
                                                    class="btn btn-success mt-3 d-flex align-items-center justify-content-center"
                                                    target="_blank"
                                                    style="text-decoration: none; padding: 10px 15px; border-radius: 5px;">
                                                    <i class="fab fa-whatsapp-square" style="font-size: 20px;"></i>
                                                    {{ __('back.Contact_whatsapp') }}
                                                </a>
                                            </div>
                                        </article>
                                    </div><!-- End product item -->
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
                                {{-- @foreach ($categories as $category)
                                    <li><a href="{{ route('category-details', $category->slug) }}">
                                            {{ app()->getLocale() == 'ar' ? $category->name_category_ar : $category->name_category_en }}
                                            <span>({{ $category->products_count }})</span></a></li>
                                @endforeach --}}
                            </ul>
                        </div><!-- /Categories Widget -->

                        <!-- Recent Products Widget -->
                        <div class="recent-products-widget widget-item">
                            <h3 class="widget-title">{{ __('front.RecentProducts') }}</h3>
                            @foreach ($recentProducts as $recent)
                                <div class="product-item">
                                    <img src="{{ asset($recent->image) }}" alt="" class="flex-shrink-0">
                                    <div>
                                        <h4><a
                                                href="{{ route('product.details', $recent->slug) }}">{{ $recent->product_name_en }}</a>
                                        </h4>
                                        <time
                                            datetime="{{ $recent->created_at }}">{{ $recent->created_at->format('M d, Y') }}</time>
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
