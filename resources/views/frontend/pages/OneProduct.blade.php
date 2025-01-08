@extends('frontend.layouts.master')
@section('title', __('back.product'))

@section('content')




    <!-- Sidebar -->
    <div class="col-lg-4 sidebar">
        <div class="widgets-container">

            <!-- Categories Widget -->
            <div class="categories-widget widget-item">
                <h3 class="widget-title">Categories</h3>
                <ul class="mt-3">
                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('categories.show', $category->id) }}">
                                {{ app()->getLocale() == 'ar' ? $category->name_ar : $category->name_en }}
                                <span>({{ $category->products->count() }})</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- /Categories Widget -->

            <!-- Recent Posts Widget -->
            <div class="recent-posts-widget widget-item">
                <h3 class="widget-title">Recent Posts</h3>
                @foreach ($recentProducts as $product)
                    <div class="post-item">
                        <img src="{{ asset($product->image) }}" alt="" class="flex-shrink-0">
                        <div>
                            <h4>
                                <a href="{{ route('products.show', $product->id) }}">
                                    {{ app()->getLocale() == 'ar' ? $product->product_name_ar : $product->product_name_en }}
                                </a>
                            </h4>
                            <span>
                                {{ __('Price:') }}
                                <del>{{ $product->Price_before_discount }}</del>
                                {{ $product->Price_after_discount }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /Recent Posts Widget -->

        </div>
    </div>
    <!-- /Sidebar -->


@endsection
