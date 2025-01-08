@extends('backend.layouts.master')

@section('title', __('back.create'))

@section('content')
    <div class="row">
        <div class="col-md-12 mt-2">
            <h4 class="header-title">{{ __('back.create_product') }}</h4>
            <div class="card">

                <div class="card-body">
                    <!-- Form to Create New Product -->
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
