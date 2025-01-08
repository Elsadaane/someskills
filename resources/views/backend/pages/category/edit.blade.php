@extends('backend.layouts.master')

@section('title', __('back.update'))

@section('content')
    <div class="row">
        <div class="col-md-12 mt-2">
            <h4 class="header-title">{{ __('back.setting') }}</h4>
            <div class="card">
                <div class="card-body">
                    <!-- Form to Update Settings -->
                    <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data"
                        novalidate class="needs-validation">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- Category Name in Arabic -->
                            <div class="form-group col-md-6">
                                <label for="name_category_ar">{{ __('back.Company_name_ar') }}</label>
                                <input type="text" class="form-control @error('name_category_ar') is-invalid @enderror"
                                    id="name_category_ar" name="name_category_ar"
                                    value="{{ old('name_category_ar', $category->name_category_ar) }}">
                                @error('name_category_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Category Name in English -->
                            <div class="form-group col-md-6">
                                <label for="name_category_en">{{ __('back.Company_name_en') }}</label>
                                <input type="text" class="form-control @error('name_category_en') is-invalid @enderror"
                                    id="name_category_en" name="name_category_en"
                                    value="{{ old('name_category_en', $category->name_category_en) }}">
                                @error('name_category_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Category Description in Arabic -->
                            <div class="form-group col-md-6">
                                <label for="description_category_ar">{{ __('back.description_catogry') }}</label>
                                <input type="text"
                                    class="form-control @error('description_category_ar') is-invalid @enderror"
                                    id="description_category_ar" name="description_category_ar"
                                    value="{{ old('description_category_ar', $category->description_category_ar) }}">
                                @error('description_category_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Category Description in English -->
                            <div class="form-group col-md-6">
                                <label for="description_category_en">{{ __('back.description_category_en') }}</label>
                                <input type="text"
                                    class="form-control @error('description_category_en') is-invalid @enderror"
                                    id="description_category_en" name="description_category_en"
                                    value="{{ old('description_category_en', $category->description_category_en) }}">
                                @error('description_category_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Image Preview and Upload -->
                        <div class="mb-3">
                            <label for="image" class="form-label">{{ __('back.image') }}</label>
                            <div class="mb-2">
                                <img src="{{ asset($category->image) }}" alt="{{ __('back.category_image') }}"
                                    class="img-thumbnail" width="60" height="60">
                            </div>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group text-center mt-4">
                            <button type="submit" class="btn btn-success">
                                {{ __('back.update_category') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
