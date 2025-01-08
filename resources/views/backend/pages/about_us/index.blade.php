@extends('backend.layouts.master')

@section('title', trans('back.about'))
@section('PagesTitle', trans('back.about_us'))
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('About.update', $about->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- الصف الأول -->
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="company_ar" class="form-label">{{ trans('back.company_name') }}</label>
                                <input type="text" class="form-control @error('company_ar') is-invalid @enderror"
                                    id="company_ar" name="company_ar" value="{{ old('company_ar', $about->company_ar) }}">
                                @error('company_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __('validation.name') }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="company_en" class="form-label">{{ trans('back.Company_name_en') }}</label>
                                <input type="text" class="form-control @error('company_en') is-invalid @enderror"
                                    id="company_en" name="company_en" value="{{ old('company_en', $about->company_en) }}">
                                @error('company_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- الصف الثاني -->
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="who_are_we_ar" class="form-label">من نحن</label>
                                <input type="text" class="form-control @error('who_are_we_ar') is-invalid @enderror"
                                    id="who_are_we_ar" name="who_are_we_ar"
                                    value="{{ old('who_are_we_ar', $about->who_are_we_ar) }}">
                                @error('who_are_we_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="who_are_we_en" class="form-label">Who are we (English)</label>
                                <input type="text" class="form-control @error('who_are_we_en') is-invalid @enderror"
                                    id="who_are_we_en" name="who_are_we_en"
                                    value="{{ old('who_are_we_en', $about->who_are_we_en) }}">
                                @error('who_are_we_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- الصف الثالث -->
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label for="contant_en">Countant</label>
                                    <textarea class="ckeditor form-control @error('contant_en') is-invalid @enderror" name="contant_en" id="contant_en"
                                        rows="5">{{ old('contant_en', $about->contant_en) }}</textarea>
                                    @error('contant_en')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label for="contant_ar">المحتوي</label>
                                    <textarea name="contant_ar" id="contant_ar" class="ckeditor form-control @error('contant_ar') is-invalid @enderror"
                                        rows="5">{{ old('contant_ar', $about->contant_ar) }}</textarea>
                                    @error('contant_ar')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- الصورة -->
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <img src="{{ asset($about->image) }}" alt="Logo" class="img-thumbnail m-2"
                                    width="60" height="60">
                                <div class="form-group">
                                    <label for="image" class="form-label">{{ trans('back.image') }}</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        name="image" id="image">
                                    @error('image')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- زر الحفظ -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">{{ trans('back.update') }}</button>
                        </div>
                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
    @push('js')
        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    @endpush
@endsection
