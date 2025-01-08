@extends('backend.layouts.master')

@section('title', __('back.create_category'))

@section('content')
    <div class="row">
        <div class="col-md-12 mt-2">
            <h4 class="header-title">{{ trans('back.setting') }}</h4>
            <div class="card">
                <div class="card-body">
                    <!-- Form to Update Settings -->
                    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" novalidate
                        class="needs-validation">
                        @csrf
                        <div class="row">






                            <!-- Company Name in Arabic -->
                            <div class="form-group col-md-6">
                                <label for="name_category_ar">{{ trans('back.name_category_ar') }}</label>
                                <input type="text" class="form-control @error('name_category_ar') is-invalid @enderror"
                                    id="name_category_ar" name="name_category_ar" value="{{ old('name_category_ar') }}">
                                @error('name_category_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Company Name in English -->
                            <div class="form-group col-md-6">
                                <label for="name_category_en">{{ trans('back.name_category_en') }}</label>
                                <input type="text" class="form-control @error('name_category_en') is-invalid @enderror"
                                    id="name_category_en" name="name_category_en" value="{{ old('name_category_en') }}">
                                @error('name_category_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- description_catogry -->
                            <div class="form-group col-md-6">
                                <label for="description_category_ar">{{ trans('back.description_category_ar') }}</label>
                                <input type="text"
                                    class="form-control @error('description_category_ar') is-invalid @enderror"
                                    id="description_category_ar" name="description_category_ar"
                                    value="{{ old('description_category_ar') }}">
                                @error('description_category_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="description_category_en">{{ trans('back.description_category_en') }}</label>
                                <input type="text"
                                    class="form-control @error('description_category_en') is-invalid @enderror"
                                    id="description_category_en" name="description_category_en"
                                    value="{{ old('description_category_en') }}">
                                @error('description_category_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                        </div>

                        <!-- Horizontal Line Divider -->
                        {{-- <hr class="col-md-12 my-4"> --}}
                        <div class="mb-3">
                            <label for="image" class="form-label"></label>
                            <input type="file" class="form-control" name="image" id="image">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group text-center mt-4">
                            <button type="submit" class="btn btn-success">{{ trans('back.add_new_category') }}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
