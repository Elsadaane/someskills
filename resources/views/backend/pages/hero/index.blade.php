@extends('backend.layouts.master')

@section('title')
    {{ trans('back.hero') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mt-2">
            <h4 class="header-title">{{ trans('back.hero') }}</h4>
            <div class="card">
                <div class="card-box">
                    <!-- عرض جميع الأخطاء -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('hero.update', $hero->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row m-4">

                            <!-- العمود الأول -->
                            <div class="col-md-6">
                                <div class="form-group mt-4">
                                    <label for="title_ar">title_ar</label>
                                    <input type="text" class="form-control" id="title_ar" name="title_ar"
                                        value="{{ old('title_ar', $hero->title_ar) }}">
                                    @error('title_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <label for="title_en">title_en</label>
                                    <input type="text" class="form-control" id="title_en" name="title_en"
                                        value="{{ old('title_en', $hero->title_en) }}">
                                    @error('title_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- العمود الثاني -->
                            <div class="col-md-6">
                                <div class="form-group mt-4">
                                    <label for="subtitle_ar">subtitle_ar</label>
                                    <input type="text" class="form-control" id="subtitle_ar" name="subtitle_ar"
                                        value="{{ old('subtitle_ar', $hero->subtitle_ar) }}">
                                    @error('subtitle_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <label for="subtitle_en">subtitle_en</label>
                                    <input type="text" class="form-control" id="subtitle_en" name="subtitle_en"
                                        value="{{ old('subtitle_en', $hero->subtitle_en) }}">
                                    @error('subtitle_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- العمود الثالث -->
                            <div class="col-md-6">
                                <div class="form-group mt-4">
                                    <label for="image">image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    @if ($hero->image)
                                        <img src="{{ asset($hero->image) }}" alt="Current Image" class="img-thumbnail mt-2"
                                            style="width: 100px;">
                                    @endif
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-4">
                                        <label for="video">video</label>
                                        <input type="url" class="form-control" id="video" name="video"
                                            value="{{ old('video', $hero->video) }}">
                                        @error('video')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <!-- العمود الرابع -->
                            <div class="col-md-6">
                                <div class="form-group mt-4">
                                    <label for="link">link</label>
                                    <input type="url" class="form-control" id="link" name="link"
                                        value="{{ old('link', $hero->link) }}">
                                    @error('link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-md-12 mt-3">
                                <button type="submit" class="btn btn-success">{{ trans('back.Save_and_Update') }}</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection

{{-- //drop dwan
// all category
أقسام المقالات
// Posts_category
// All product
// One Posts --}}
