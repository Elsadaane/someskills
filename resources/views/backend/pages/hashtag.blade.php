@extends('backend.layouts.master')

@section('title', 'hashtag')

@section('content')
    <div class="row">
        <div class="col-md-12 mt-2">
            <h4 class="header-title">hashtag</h4>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('add-hashtag') }}" method="POST" enctype="multipart/form-data" novalidate
                        class="needs-validation">
                        @csrf

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="name">{{ __('back.name') }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group text-center mt-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-hashtag" aria-hidden="true">hashtag</i>
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
