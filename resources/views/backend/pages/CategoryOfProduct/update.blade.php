@extends('backend.layouts.master')

@section('title', __('back.update_category'))

@section('content')
    <div class="row">
        <div class="col-md-12 mt-2">
            <h4 class="header-title">{{ __('back.create_category') }}</h4>
            <div class="card">
                <div class="card-body">
                    <!-- Form to Create New Category -->
                    <form action="{{ route('CategoryOfProduct.update', $category->id) }}" method="POST"
                        enctype="multipart/form-data" novalidate class="needs-validation">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- name in Arabic -->
                            <div class="form-group col-md-6">
                                <label for="name_ar">{{ __('back.name_ar') }}</label>
                                <input type="text" class="form-control @error('name_ar') is-invalid @enderror"
                                    id="name_ar" name="name_ar" value="{{ old('name_ar', $category->name_ar) }}">
                                @error('name_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- name in english -->
                            <div class="form-group col-md-6">
                                <label for="name_en">{{ __('back.name_en') }}</label>
                                <input type="text" class="form-control @error('name_en') is-invalid @enderror"
                                    id="name_en" name="name_en" value="{{ old('name_en', $category->name_en) }}">
                                @error('name_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">{{ __('back.count') }}</label>
                                <input type="text" class="form-control "id="" readonly name=""
                                    value=" {{ $category->products->count() }}">
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
                                {{ __('back.create_category') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
