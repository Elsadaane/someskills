@extends('backend.layouts.master')
@section('title', __('Category Of Product'))

@section('content')
    <div class="row">
        <h4 class="header-title mt-2">{{ __('back.category') }}</h4>
        <div class="d-flex mb-3">
            <a href="#" class="btn btn-soft-success waves-effect waves-light"  data-bs-toggle="modal" data-bs-target="#category">
                {{ __('back.add_new_category') }}
            </a>
            <a href="{{ route('categoryArchives.index') }}" class="btn btn-soft-dark waves-effect waves-light ms-2">
                {{ __('back.archive') }}
            </a>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center header-title">{{ __('back.category') }}</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>{{ __('back.name_category_ar') }}</th>
                                <th>{{ __('back.name_category_en') }}</th>
                                <th>{{ __('back.description_category_ar') }}</th>
                                <th>{{ __('back.description_category_en') }}</th>
                                <th>{{ __('back.image') }}</th>
                                <th>{{ __('back.Created_at') }}</th>
                                <th>{{ __('back.count') }}</th>
                                <th>{{ __('action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->name_category_ar }}</td>
                                    <td>{{ $category->name_category_en }}</td>
                                    <td>{{ $category->description_category_ar }}</td>
                                    <td>{{ $category->description_category_en }}</td>
                                    <td><img src="{{ asset($category->image) }}" alt="Image" width="50"></td>
                                    <td>{{ $category->created_at->diffForHumans() }}</td>
                                    <td>{{ $category->posts->count() }}</td>
                                    <td>
                                        <a href="#"
                                            class="btn btn-sm btn-secondary"  data-bs-toggle="modal" data-bs-target="#edit{{$category->id}}" >
                                            {{ __('back.edit') }}
                                        </a>
                                        <a href="{{ route('category.allProduct', $category->id) }}"
                                            class="btn btn-sm btn-primary">
                                            {{ __('back.allPostsBelong') }}
                                        </a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#destroy{{$category->id}}"
                                            class="btn btn-sm btn-danger">
                                            {{ __('back.delete') }}
                                        </a>
                                    </td>
                                    <div class="modal fade" id="edit{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <form action="{{ route('category.update', 'test') }}" method="POST" enctype="multipart/form-data"
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
                                                            <input type="hidden" name="id" value="{{$category->id}}" id="id">

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

                                    <!-- delete_modal_category -->
                                    <div class="modal fade" id="destroy{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel" style="font-family: 'Cairo', sans-serif;">
                                                        {{ trans('back.delete_class') }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('category.destroy', 'test') }}" method="post">
                                                        @method('Delete')
                                                        @csrf
                                                        <p>{{ trans('back.Warning_Grade') }}</p>
                                                        <input id="id" type="hidden" name="id" class="form-control" value="{{ $category->id }}">
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="category" tabindex="-1" aria-labelledby="category" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="category">
                        {{__('back.category')}}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
