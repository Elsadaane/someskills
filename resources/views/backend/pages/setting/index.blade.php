@extends('backend.layouts.master')

@section('title')
    {{ trans('back.setting') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mt-2">
            <h4 class="header-title">{{ trans('back.setting') }}</h4>
            <div class="card">
                <!-- Card Header -->
                {{-- <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">{{ trans('back.setting') }}</h4>
                    </div> --}}

                <!-- Card Body -->
                <div class="card-body">
                    <!-- Form to Update Settings -->
                    <form action="{{ route('setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data"
                        novalidate class="needs-validation">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Company Name in Arabic -->
                            <div class="form-group col-md-6">
                                <label for="website_name_ar">{{ trans('back.Company_name') }}</label>
                                <input type="text" class="form-control @error('website_name_ar') is-invalid @enderror"
                                    id="website_name_ar" name="website_name_ar"
                                    value="{{ old('website_name_ar', $setting->website_name_ar) }}">
                                @error('website_name_ar')
                                    website_name_ar
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Company Name in English -->
                            <div class="form-group col-md-6">
                                <label for="website_name_en">{{ trans('back.Company_name_en') }}</label>
                                <input type="text" class="form-control @error('website_name_en') is-invalid @enderror"
                                    id="website_name_en" name="website_name_en"
                                    value="{{ old('website_name_en', $setting->website_name_en) }}">
                                @error('website_name_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="form-group col-md-6">
                                <label for="email">{{ trans('back.Email') }}</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email', $setting->email) }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="form-group col-md-6">
                                <label for="phone">{{ trans('back.Phone') }}</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" value="{{ old('phone', $setting->phone) }}">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Horizontal Line Divider -->
                        {{-- <hr class="col-md-12 my-4"> --}}
                        <img src="{{ asset($setting->logo) }}" alt="Logo" class="img-thumbnail m-2" width="60"
                            height="60">
                        <div class="mb-3">
                            <label for="image" class="form-label"></label>
                            <input type="file" class="form-control" name="logo" id="image">
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group text-center mt-4">
                            <button type="submit" class="btn btn-success">{{ trans('back.Save_and_Update') }}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
