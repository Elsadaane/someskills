@extends('backend.layouts.master')
@section('title', __('back.archive'))

@section('content')
    <div class="row">
        <h4 class="header-title mt-2 text-center">{{ __('back.archive') }}</h4>
        <div class="d-flex mb-3">
            <a href="{{ route('posts.index') }}" class="btn btn-soft-success waves-effect waves-light">
                {{ __('back.back') }}
            </a>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center header-title">{{ __('back.posts_archive') }}</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>{{ __('back.image') }}</th>
                                <th>{{ __('back.title') }}</th>
                                <th>{{ __('back.content') }}</th>
                                <th>{{ __('back.Category') }}</th>
                                <th>{{ __('back.timeofdelete') }}</th>
                                <th>{{ __('action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>
                                        <img src="{{ asset($post->image) }}" alt="Post Image" width="50">
                                    </td>
                                    <td>
                                        {{ app()->getLocale() == 'ar' ? $post->title_ar : $post->title_en }}
                                    </td>
                                    <td>
                                        {{ app()->getLocale() == 'ar' ? $post->content_ar : $post->content_en }}
                                    </td>
                                    <td>
                                        @if ($post->PostsCatogry)
                                            {{ app()->getLocale() == 'ar' ? $post->PostsCatogry->name_catogry_ar : $post->PostsCatogry->name_catogry_en }}
                                        @else
                                            {{ app()->getLocale() == 'ar' ? 'لا يوجد' : 'Doesn’t belong to any' }}
                                        @endif
                                    </td>
                                    <td>
                                        {{ $post->deleted_at->diffForHumans() }}
                                    </td>
                                    <td>
                                        <form action="{{ route('PostArchives.update', $post->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm btn-primary">
                                                {{ __('back.restore') }}
                                            </button>
                                        </form>
                                        <form action="{{ route('PostArchives.destroy', $post->id) }}" method="POST"
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
