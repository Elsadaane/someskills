@extends('backend.layouts.master')
@section('title', __('back.category'))
@section('content')
    <div class="row">
        <h4 class="header-title mt-2">{{ __('back.product') }}</h4>
        <div class="d-flex mb-3">
            <a href="#" type="button"
                class="btn btn-soft-success waves-effect waves-light"  data-bs-toggle="modal" data-bs-target="#Product">{{ __('back.add_new_product') }}</a>
            <a href="{{ route('ProductCategoryArchives.index') }}" type="button"
                class="btn btn-soft-dark waves-effect waves-light">{{ __('back.archive') }}</a>
        </div>

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        @foreach ($products as $product)
                            <div class="col-md-4 col-lg-3">
                                <div class="card h-100 shadow-sm">
                                    <!-- Image with Status Overlay -->
                                    <div class="position-relative">
                                        <img src="{{ asset($product->image) }}" class="card-img-top rounded-top"
                                            alt="Product Image">
                                        @if ($product->status == 1)
                                            <span
                                                class="badge bg-success position-absolute top-0 start-0 m-2">{{ __('back.active') }}</span>
                                        @else
                                            <span
                                                class="badge bg-danger position-absolute top-0 start-0 m-2">{{ __('back.inactive') }}</span>
                                        @endif
                                    </div>

                                    <div class="card-body d-flex flex-column">
                                        <!-- Category ID -->
                                        <h6 class="text-muted">{{ __('back.Category') }}:
                                            @if ($product->category)
                                                {{ app()->getLocale() == 'ar' ? $product->category->name_ar : $product->category->name_en }}
                                            @else
                                                {{ app()->getLocale() == 'ar' ? 'لا يوجد' : 'does not belong to any' }}
                                            @endif
                                        </h6>

                                        <!-- Product Name -->
                                        <h5 class="card-title text-truncate">
                                            {{ app()->getLocale() == 'ar' ? $product->product_name_ar : $product->product_name_en }}
                                        </h5>

                                        <!-- Product Description -->
                                        <p class="card-text text-muted">
                                            {{ app()->getLocale() == 'ar' ? $product->Product_Description_ar : $product->Product_Description_en }}
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
                                            <a href="#"data-bs-toggle="modal" data-bs-target="#edit{{$product->id}}"

                                                class="btn btn-sm btn-secondary">{{ __('back.edit') }}</a>
                                                <!-- Delete Form -->
                                                <a href="#"data-bs-toggle="modal" data-bs-target="#destroy{{$product->id}}"

                                                    class="btn btn-sm btn-danger">{{ __('back.delete') }}</a>

                                            <span>{{ $product->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                        <!-- edit_modal_Grade -->
<div class="modal fade" id="edit{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-family: 'Cairo', sans-serif;">
                    {{ trans('back.edit_class') }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- edit_form -->
                <form action="{{ route('Product.update', 'test') }}" method="POST" enctype="multipart/form-data"
                    novalidate class="needs-validation">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <input id="id" type="hidden" name="id" class="form-control" value="{{ $product->id }}">
                        <!-- Category Product -->
                        <div class="form-group col-md-6">
                            <label for="category_product_id">{{ __('back.category') }}</label>
                            <select class="form-control @error('category_product_id') is-invalid @enderror"
                                id="category_product_id" name="category_product_id">
                                <option value="" disabled selected>{{ __('back.select_category') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if ($category->id == $product->category_product_id) @selected(true) @endif>
                                        {{ old('category_product_id') == $category->id ? 'selected' : '' }}
                                        {{ app()->getLocale() == 'ar' ? $category->name_ar : $category->name_en }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_product_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status">{{ __('back.Status') }}</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status">
                                <option value="1"
                                    @if ($product->status == '1') @selected(true) @endif>
                                    {{ __('back.active') }}
                                </option>
                                <option value="0"
                                    @if ($product->status == '0') @selected(true) @endif>
                                    {{ __('back.inactive') }}
                                </option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Product Name in Arabic -->
                        <div class="form-group col-md-6">
                            <label for="product_name_ar">{{ __('back.product_name_ar') }}</label>
                            <input type="text" class="form-control @error('product_name_ar') is-invalid @enderror"
                                id="product_name_ar" name="product_name_ar"
                                value="{{ old('product_name_ar', $product->product_name_ar) }}">
                            @error('product_name_ar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Product Name in English -->
                        <div class="form-group col-md-6">
                            <label for="product_name_en">{{ __('back.product_name_en') }}</label>
                            <input type="text" class="form-control @error('product_name_en') is-invalid @enderror"
                                id="product_name_en" name="product_name_en"
                                value="{{ old('product_name_en', $product->product_name_en) }}">
                            @error('product_name_en')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Price Before Discount -->
                        <div class="form-group col-md-6">
                            <label for="Price_before_discount">{{ __('back.price_before_discount') }}</label>
                            <input type="number" step="0.01"
                                class="form-control @error('Price_before_discount') is-invalid @enderror"
                                id="Price_before_discount" name="Price_before_discount"
                                value="{{ old('Price_before_discount', $product->Price_before_discount) }}">
                            @error('Price_before_discount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Price After Discount -->
                        <div class="form-group col-md-6">
                            <label for="Price_after_discount">{{ __('back.price_after_discount') }}</label>
                            <input type="number" step="0.01"
                                class="form-control @error('Price_after_discount') is-invalid @enderror"
                                id="Price_after_discount" name="Price_after_discount"
                                value="{{ old('Price_after_discount', $product->Price_after_discount) }}">
                            @error('Price_after_discount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Product Description -->
                        <div class="form-group col-md-6">
                            <label for="Product_Description_ar">{{ __('back.Product_Description_ar') }}</label>
                            <textarea class="form-control @error('Product_Description_ar') is-invalid @enderror" id="Product_Description_ar"
                                name="Product_Description_ar">{{ old('Product_Description_ar', $product->Product_Description_ar) }}</textarea>
                            @error('Product_Description_ar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Product_Description_en">{{ __('back.Product_Description_en') }}</label>
                            <textarea class="form-control @error('Product_Description_en') is-invalid @enderror" id="Product_Description_en"
                                name="Product_Description_en">{{ old('Product_Description_en', $product->Product_Description_en) }}</textarea>
                            @error('Product_Description_en')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Image Upload -->
                    <img src="{{ asset($product->image) }}" alt="image" class="img-thumbnail m-2" width="60"
                        height="60">
                    <div class="mb-3">
                        <label for="image" class="form-label">{{ __('back.image') }}</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                            id="image">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group text-center mt-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('back.update') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- delete_modal_Grade -->
<div class="modal fade" id="destroy{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-family: 'Cairo', sans-serif;">
                    {{ trans('back.delete_class') }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Product.destroy', 'test') }}" method="post">
                    @method('Delete')
                    @csrf
                    <p>{{ trans('back.Warning_Grade') }}</p>
                    <input id="id" type="hidden" name="id" class="form-control" value="{{ $product->id }}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            {{ trans('back.Close') }}
                        </button>
                        <button type="submit" class="btn btn-danger">
                            {{ trans('back.submit') }}
                        </button>
                    </div>
                </form>
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

    <div class="modal fade" id="Product" tabindex="-1" aria-labelledby="Product" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Product">
                        {{__('back.Product')}}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                                      <form action="{{ route('Product.store') }}" method="POST" enctype="multipart/form-data" novalidate
                        class="needs-validation">
                        @csrf

                        <div class="row">
                            <!-- Category Product -->
                            <div class="form-group col-md-6">
                                <label for="category_product_id">{{ __('back.category') }}</label>
                                <select class="form-control @error('category_product_id') is-invalid @enderror"
                                    id="category_product_id" name="category_product_id">
                                    <option value="" disabled selected>{{ __('back.select_category') }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_product_id') == $category->id ? 'selected' : '' }}>
                                            {{ app()->getLocale() == 'ar' ? $category->name_ar : $category->name_en }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_product_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Product Name in Arabic -->
                            <div class="form-group col-md-6">
                                <label for="product_name_ar">{{ __('back.product_name_ar') }}</label>
                                <input type="text" class="form-control @error('product_name_ar') is-invalid @enderror"
                                    id="product_name_ar" name="product_name_ar" value="{{ old('product_name_ar') }}">
                                @error('product_name_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Product Name in English -->
                            <div class="form-group col-md-6">
                                <label for="product_name_en">{{ __('back.product_name_en') }}</label>
                                <input type="text" class="form-control @error('product_name_en') is-invalid @enderror"
                                    id="product_name_en" name="product_name_en" value="{{ old('product_name_en') }}">
                                @error('product_name_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Price Before Discount -->
                            <div class="form-group col-md-6">
                                <label for="Price_before_discount">{{ __('back.price_before_discount') }}</label>
                                <input type="number" step="0.01"
                                    class="form-control @error('Price_before_discount') is-invalid @enderror"
                                    id="Price_before_discount" name="Price_before_discount"
                                    value="{{ old('Price_before_discount') }}">
                                @error('Price_before_discount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Price After Discount -->
                            <div class="form-group col-md-6">
                                <label for="Price_after_discount">{{ __('back.price_after_discount') }}</label>
                                <input type="number" step="0.01"
                                    class="form-control @error('Price_after_discount') is-invalid @enderror"
                                    id="Price_after_discount" name="Price_after_discount"
                                    value="{{ old('Price_after_discount') }}">
                                @error('Price_after_discount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Product Description in Arabic -->
                            <div class="form-group col-md-6">
                                <label for="Product_Description_ar">{{ __('back.Product_Description_ar') }}</label>
                                <textarea class="form-control @error('Product_Description_ar') is-invalid @enderror" id="Product_Description_ar"
                                    name="Product_Description_ar">{{ old('Product_Description_ar') }}</textarea>
                                @error('Product_Description_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Product Description in English -->
                            <div class="form-group col-md-6">
                                <label for="Product_Description_en">{{ __('back.Product_Description_en') }}</label>
                                <textarea class="form-control @error('Product_Description_en') is-invalid @enderror" id="Product_Description_en"
                                    name="Product_Description_en">{{ old('Product_Description_en') }}</textarea>
                                @error('Product_Description_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="mb-3">
                                <label for="status">{{ __('back.Status') }}</label>

                                <select class="form-control @error('status') is-invalid @enderror" name="status">
                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                                        {{ __('back.inactive') }}
                                    </option>
                                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>
                                        {{ __('back.active') }}
                                    </option>
                                </select>

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Image Upload -->
                            <div class="mb-3">
                                <label for="image" class="form-label">{{ __('back.image') }}</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    name="image" id="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <!-- Submit Button -->
                        <div class="form-group text-center mt-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('back.create_product') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
