@extends('backend.layouts.master')
@section('title', __('Category Of Product'))

@section('content')
    <div class="row">
        <h4 class="header-title mt-2">{{ __('back.category') }}</h4>
        <div class="d-flex mb-3">
            <a href="{{ route('category.create') }}" class="btn btn-soft-success waves-effect waves-light">
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
                                        <a href="{{ route('category.edit', $category->id) }}"
                                            class="btn btn-sm btn-secondary">
                                            {{ __('back.edit') }}
                                        </a>
                                        <a href="{{ route('category.allProduct', $category->id) }}"
                                            class="btn btn-sm btn-primary">
                                            {{ __('back.allPostsBelong') }}
                                        </a>
                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST"
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
