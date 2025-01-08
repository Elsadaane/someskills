@extends('backend.layouts.master')
@section('title', __('back.products'))
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('Product.index') }}" type="button"
                        class="btn btn-soft-success waves-effect waves-light">{{ __('back.back') }}</a>
                    <h4 class="header-title text-center mb-4">{{ __('back.all_products') }}</h4>

                    <div class="row g-3">
                        @foreach ($productes as $product)
                            <div class="col-md-4 col-lg-3">
                                <div class="card h-100 shadow-sm">
                                    <!-- Image -->
                                    <img src="{{ asset($product->image) }}" class="card-img-top rounded-top"
                                        alt="Product Image">

                                    <div class="card-body d-flex flex-column">
                                        <!-- Category -->
                                        <h6 class="text-muted">{{ __('back.Category') }}:
                                            @if ($product->Catogry_product)
                                                {{ app()->getLocale() == 'ar' ? $product->Catogry_product->name_ar : $product->Catogry_product->name_en }}
                                            @else
                                                {{ app()->getLocale() == 'ar' ? 'لا يوجد' : 'doesn t belong to any category' }}
                                            @endif
                                        </h6>

                                        <!-- Product Name -->
                                        <h5 class="card-title text-truncate">
                                            {{ app()->getLocale() == 'ar' ? $product->product_name_ar : $product->product_name_en }}
                                        </h5>

                                        <!-- Product Description -->
                                        <p class="card-text text-muted">
                                            {{ app()->getLocale() == 'ar' ? $product->Product_Description : $product->Product_Description }}
                                        </p>

                                        <!-- Price Info -->
                                        <p class="card-text">
                                            <span class="text-muted">{{ __('back.Price Before Discount') }}:</span>
                                            <span
                                                class="text-danger text-decoration-line-through">${{ $product->Price_before_discount }}</span>
                                        </p>
                                        <p class="card-text">
                                            <span class="text-muted">{{ __('back.Price After Discount') }}:</span>
                                            <span class="text-success">${{ $product->Price_after_discount }}</span>
                                        </p>

                                        <div class="d-flex justify-content-between mt-3">
                                            <!-- Edit Button -->
                                            <form action="{{ route('ProductCategoryArchives.update', $product->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                    class="btn btn-sm btn-secondary">{{ __('back.restore') }}</button>
                                            </form>

                                            <!-- Delete Form -->
                                            <form action="{{ route('ProductCategoryArchives.destroy', $product->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-sm btn-danger">{{ __('back.delete') }}</button>
                                            </form>
                                            <!-- Time Since Creation -->
                                            <span>{{ $product->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div> <!-- end row-->
                </div> <!-- end card-body-->
            </div>
        </div>
    </div>
@endsection
