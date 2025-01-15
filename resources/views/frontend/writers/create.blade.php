@extends('frontend.layouts.master')

@section('title', __('back.create_post'))

@section('content')
    <div class="row">
        <div class="col-md-12 mt-2">
            <h4 class="header-title">{{ __('back.create_post') }}</h4>
            <div class="card">
                <div class="card-body">
                    <!-- Form to Create New Post -->
                    <form action="{{ route('writer.store') }}" method="POST" enctype="multipart/form-data" novalidate
                        class="needs-validation">
                        @csrf

                        <div class="row">
                            <!-- Post Category -->
                            <div class="form-group col-md-6">
                                <label for="posts_category_id">{{ __('back.category') }}</label>
                                <select class="form-control @error('posts_category_id') is-invalid @enderror"
                                    id="posts_category_id" name="posts_category_id">
                                    <option value="" disabled selected>{{ __('back.select_category') }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('posts_category_id') == $category->id ? 'selected' : '' }}>
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

                            <!-- Post Title in Arabic -->
                            <div class="form-group col-md-6">
                                <label for="title_ar">{{ __('back.title_ar') }}</label>
                                <input type="text" class="form-control @error('title_ar') is-invalid @enderror"
                                    id="title_ar" name="title_ar" value="{{ old('title_ar') }}">
                                @error('title_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Post Title in English -->
                            <div class="form-group col-md-6">
                                <label for="title_en">{{ __('back.title_en') }}</label>
                                <input type="text" class="form-control @error('title_en') is-invalid @enderror"
                                    id="title_en" name="title_en" value="{{ old('title_en') }}">
                                @error('title_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Post Content in Arabic -->
                            <div class="form-group col-md-12">
                                <label for="content_ar">{{ __('back.content_ar') }}</label>
                                <textarea class="form-control @error('content_ar') is-invalid @enderror" id="content_ar" name="content_ar">{{ old('content_ar') }}</textarea>
                                @error('content_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Post Content in English -->
                            <div class="form-group col-md-12">
                                <label for="content_en">{{ __('back.content_en') }}</label>
                                <textarea class="form-control @error('content_en') is-invalid @enderror" id="content_en" name="content_en">{{ old('content_en') }}</textarea>
                                @error('content_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Image Upload -->
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
                                {{ __('back.create_post') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
