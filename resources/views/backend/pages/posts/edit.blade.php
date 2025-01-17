@extends('backend.layouts.master')

@section('title', __('back.update_category'))

@section('content')
    <div class="row">
        <div class="col-md-12 mt-2">
            <h4 class="header-title">{{ __('back.update_category') }}</h4>
            <div class="card">
                <div class="card-body">
                    <!-- Form to Create New Category -->
                    <form action="{{ route('posts.update', $product->id) }}" method="POST" enctype="multipart/form-data"
                        novalidate class="needs-validation">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Category -->
                            <div class="form-group col-md-6">
                                <label for="posts_category_id">{{ __('back.catogry') }}</label>
                                <select class="form-control @error('posts_category_id') is-invalid @enderror"
                                    id="posts_category_id" name="posts_category_id">
                                    <option value="" disabled selected>{{ __('back.select_category') }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if ($category->id == $product->posts_category_id) @selected(true) @endif>
                                            {{ old('posts_category_id') == $category->id ? 'selected' : '' }}
                                            {{ app()->getLocale() == 'ar' ? $category->name_category_ar : $category->name_category_en }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('posts_category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
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

                            <!-- Title in Arabic -->
                            <div class="form-group col-md-6">
                                <label for="title_ar">{{ __('back.title_ar') }}</label>
                                <input type="text" class="form-control @error('title_ar') is-invalid @enderror"
                                    id="title_ar" name="title_ar" value="{{ old('title_ar', $product->title_ar) }}">
                                @error('title_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Title in English -->
                            <div class="form-group col-md-6">
                                <label for="title_en">{{ __('back.title_en') }}</label>
                                <input type="text" class="form-control @error('title_en') is-invalid @enderror"
                                    id="title_en" name="title_en" value="{{ old('title_en', $product->title_en) }}">
                                @error('title_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Content in Arabic -->
                            <div class="form-group col-md-6">
                                <label for="content_ar">{{ __('back.content_ar') }}</label>
                                <textarea class="form-control @error('content_ar') is-invalid @enderror" id="content_ar" name="content_ar">{{ old('content_ar', $product->content_ar) }}</textarea>
                                @error('content_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Content in English -->
                            <div class="form-group col-md-6">
                                <label for="content_en">{{ __('back.content_en') }}</label>
                                <textarea class="form-control @error('content_en') is-invalid @enderror" id="content_en" name="content_en">{{ old('content_en', $product->content_en) }}</textarea>
                                @error('content_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <img src="{{ asset($product->image) }}" alt="image" class="img-thumbnail m-2" width="60"
                            height="60">
                        <!-- Image Upload -->
                        <div class="mb-3">
                            <label for="image" class="form-label">{{ __('back.image') }}</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group text-center mt-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('back.update_category') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
