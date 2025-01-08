@extends('backend.layouts.master')
@section('title', __('back.category'))
@section('content')
    <div class="row">
        <h4 class="header-title mt-2">{{ __('back.allPostsBelong') }}</h4>
        <div class="d-flex mb-3">
            <a href="{{ route('posts.create') }}" type="button"
                class="btn btn-soft-success waves-effect waves-light">{{ __('back.add_new_post') }}</a>
            <a href="{{ route('PostArchives.index') }}" type="button"
                class="btn btn-soft-dark waves-effect waves-light">{{ __('back.archive') }}</a>

        </div>

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        @foreach ($posts_category as $products)
                            <div class="col-md-4 col-lg-3">
                                <div class="card h-100 shadow-sm">
                                    <img src="{{ asset($products->image) }}" class="card-img-top rounded-top"
                                        alt="Category Image">

                                    <div class="card-body d-flex flex-column">
                                        <!-- Category ID -->
                                        <h6 class="text-muted">{{ __('back.Category') }}:
                                            {{ app()->getLocale() == 'ar' ? $products->PostsCategory->name_category_ar : $products->PostsCategory->name_category_en }}
                                        </h6>

                                        <!-- Title -->
                                        <h5 class="card-title text-truncate">
                                            {{ app()->getLocale() == 'ar' ? $products->title_ar : $products->title_en }}
                                        </h5>

                                        <!-- Content -->
                                        <p class="card-text text-muted">
                                            {{ app()->getLocale() == 'ar' ? $products->content_ar : $products->content_en }}
                                        </p>

                                        <div class="d-flex justify-content-between mt-3">
                                            <a href="{{ route('posts.edit', $products->id) }}"
                                                class="btn btn-sm btn-secondary">{{ __('back.edit') }}</a>
                                            <!-- Delete Form -->
                                            <form action="{{ route('posts.destroy', $products->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-sm btn-danger">{{ __('back.delete') }}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div> <!-- end row-->
                </div> <!-- end card-body-->
            </div>
        </div>
    </div>
@endsection
