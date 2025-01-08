@extends('backend.layouts.master')
@section('title', __('back.posts'))

@section('content')
    <div class="row">
        <h4 class="header-title mt-2">{{ __('back.posts') }}</h4>
        <div class="d-flex mb-3">
            <a href="{{ route('posts.create') }}" class="btn btn-soft-success waves-effect waves-light">
                {{ __('back.add_new_post') }}
            </a>
            <a href="{{ route('PostArchives.index') }}" class="btn btn-soft-dark waves-effect waves-light ms-2">
                {{ __('back.archive') }}
            </a>
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
                                        {{ $products->created_at->diffForHumans() }}
                                    </td>
                                    <td>
                                        <a href="{{ route('posts.edit', $products->id) }}"
                                            class="btn btn-sm btn-secondary">
                                            {{ __('back.edit') }}
                                        </a>
                                        <form action="{{ route('posts.destroy', $products->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                {{ __('back.delete') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
