@extends('backend.layouts.master')
@section('title', __('back.archive'))

@section('content')
    <div class="row">
        <h4 class="header-title mt-2">{{ __('back.archived_categories') }}</h4>
        <div class="d-flex mb-3">
            <a href="{{ route('category.index') }}" class="btn btn-soft-success waves-effect waves-light">
                {{ __('back.back') }}
            </a>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center header-title">{{ __('back.archived_categories') }}</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>{{ __('back.name_category') }}</th>
                                <th>{{ __('back.description_category') }}</th>
                                <th>{{ __('back.image') }}</th>
                                <th>{{ __('back.timeofdelete') }}</th>
                                <th>{{ __('action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($catogrys as $catogry)
                                <tr>
                                    <td>{{ $catogry->name_catogry }}</td>
                                    <td>{{ $catogry->description_catogry }}</td>
                                    <td><img src="{{ asset($catogry->image) }}" alt="Image" width="50"></td>
                                    <td>{{ $catogry->deleted_at->diffForHumans() }}</td>
                                    <td>
                                        <form action="{{ route('categoryArchives.update', $catogry->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm btn-primary">
                                                {{ __('back.restore') }}
                                            </button>
                                        </form>
                                        <form action="{{ route('categoryArchives.destroy', $catogry->id) }}" method="POST"
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
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
