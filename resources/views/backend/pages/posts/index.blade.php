@extends('backend.layouts.master')
@section('title', __('back.posts'))

@section('content')
<div class="row">
    <h4 class="header-title mt-2">{{ __('back.posts') }}</h4>
    <div class="d-flex mb-3">
        <a href="#" class="btn btn-soft-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#add_post">
            {{ __('back.add_new_post') }}
        </a>
        <a href="{{ route('PostArchives.index') }}" class="btn btn-soft-dark waves-effect waves-light ms-2">
            {{ __('back.archive') }}
        </a>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            هشتاج
        </button>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="text-center header-title">{{ __('back.posts_list') }}</h4>
                <table id="datatable" class="table table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>{{ __('back.image') }}</th>
                            <th>{{ __('back.title') }}</th>
                            <th>{{ __('back.content') }}</th>
                            <th>{{ __('back.Category') }}</th>
                            <th>{{ __('back.owner') }}</th>
                            <th>{{ __('back.owner_name') }}</th>
                            <th>{{ __('back.status') }}</th>
                            <th>Tag</th>
                            <th>{{ __('back.Created_at') }}</th>
                            <th>{{ __('action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productes as $products)
                            <tr>
                                <td>
                                    <img src="{{ asset($products->image) }}" alt="Post Image" width="50">
                                </td>
                                <td>
                                    {{ app()->getLocale() == 'ar' ? $products->title_ar : $products->title_en }}
                                </td>
                                <td>
                                    {{ app()->getLocale() == 'ar' ? $products->content_ar : $products->content_en }}
                                </td>
                                <td>
                                    @if ($products->PostsCategory)
                                        {{ app()->getLocale() == 'ar' ? $products->PostsCategory->name_category_ar : $products->PostsCategory->name_category_en }}
                                    @else
                                        {{ app()->getLocale() == 'ar' ? 'لا يوجد' : 'Doesn’t belong to any' }}
                                    @endif
                                </td>
                                <td>
                                    {{ $products->user_type }}
                                </td>
                                <td>
                                    {{ $products->writer->name ?? 'admin' }}

                                </td>
                                <td>
                                    @if ($products->status == 1)
                                        <span class="badge bg-success start-0 m-2">{{ __('back.active') }}</span>
                                    @else
                                        <span class="badge bg-danger start-0 m-2">{{ __('back.inactive') }}</span>
                                    @endif
                                </td>
                                <td>
                                    <ul>
                                        @foreach ($products->tags as $tag)
                                            <li>{{ $tag->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    {{ $products->created_at->diffForHumans() }}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#edit{{$products->id}}">
                                        {{ __('back.edit') }}
                                      </button>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#destroy{{$products->id}}">
                                        {{ __('back.delete') }}
                                    </button>
                                </td>
                            </tr>
                            <!-- edit_modal_Grade -->
<div class="modal fade" id="edit{{ $products->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form action="{{ route('posts.update', 'test') }}" method="POST" enctype="multipart/form-data"
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
                                        @if ($category->id == $products->posts_category_id) @selected(true) @endif>
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
                                    @if ($products->status == '1') @selected(true) @endif>
                                    {{ __('back.active') }}
                                </option>
                                <option value="0"
                                    @if ($products->status == '0') @selected(true) @endif>
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
                                id="title_ar" name="title_ar" value="{{ old('title_ar', $products->title_ar) }}">
                                <input id="id" type="hidden" name="id" class="form-control" value="{{ $products->id }}">
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
                                id="title_en" name="title_en" value="{{ old('title_en', $products->title_en) }}">
                            @error('title_en')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Content in Arabic -->
                        <div class="form-group col-md-6">
                            <label for="content_ar">{{ __('back.content_ar') }}</label>
                            <textarea class="form-control @error('content_ar') is-invalid @enderror" id="content_ar" name="content_ar">{{ old('content_ar', $products->content_ar) }}</textarea>
                            @error('content_ar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Content in English -->
                        <div class="form-group col-md-6">
                            <label for="content_en">{{ __('back.content_en') }}</label>
                            <textarea class="form-control @error('content_en') is-invalid @enderror" id="content_en" name="content_en">{{ old('content_en', $products->content_en) }}</textarea>
                            @error('content_en')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <img src="{{ asset($products->image) }}" alt="image" class="img-thumbnail m-2" width="60"
                        height="60">
                    <!-- Image Upload -->
                    <div class="mb-3">
                        <label for="image" class="form-label">{{ __('back.image') }}</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                    <div class="mb-3">

                        <label for="tags">Tags:</label>
                        <select name="tags[]" id="tags" multiple="multiple" style="width: 100%;">
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
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

<!-- delete_modal_Grade -->
<div class="modal fade" id="destroy{{ $products->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-family: 'Cairo', sans-serif;">
                    {{ trans('back.delete_class') }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('posts.destroy', 'test') }}" method="post">
                    @method('Delete')
                    @csrf
                    <p>{{ trans('back.Warning_Grade') }}</p>
                    <input id="id" type="hidden" name="id" class="form-control" value="{{ $products->id }}">
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- add-hash -class -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    هشتاج
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row mb-3" action="{{ route('add-hashtag') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="List_Classes">
                                <div data-repeater-item>
                                    <div class="row">
                                        <div class="col">
                                            <label for="name" class="mr-sm-2">الاسم :</label>
                                            <input class="form-control" type="text" name="name"
                                                placeholder="أدخل اسم الهشتاج" />
                                        </div>
                                        <div class="col-2 d-flex align-items-center">
                                            <button type="button" data-repeater-delete class="btn btn-danger">
                                                حذف
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="button" data-repeater-create class="btn btn-success mt-3">
                                إضافة حقل جديد
                            </button>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary mt-3">إرسال</button>

                </form>
            </div>
        </div>
    </div>
</div>
{{-- add posts class --}}
<div class="modal fade" id="add_post" tabindex="-1" aria-labelledby="add_post" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_post">
                    {{__('back.add_post')}}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" novalidate
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
                <div class="mb-3">

                    <label for="tags">Tags:</label>
                    <select name="tags[]" id="tags" multiple="multiple" style="width: 100%;">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
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
@push('js')
    <!-- مكتبة jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- مكتبة Form Repeater -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.repeater').repeater({
                initEmpty: false,
                defaultValues: {
                    'name': ''
                },
                show: function () {
                    $(this).slideDown();
                },
                hide: function (deleteElement) {
                    if (confirm('هل تريد حذف هذا الحقل؟')) {
                        $(this).slideUp(deleteElement);
                    }
                },
            });
        });
    </script>
@endpush
