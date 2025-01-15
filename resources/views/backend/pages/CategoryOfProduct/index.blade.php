@extends('backend.layouts.master')
@section('title', 'Category Of Product')
@section('content')
    <div class="row">
        <h4 class="header-title mt-2">{{ __('back.category') }}</h4>
        <div class="d-flex mb-3">
            <a href="#" class="btn btn-soft-success waves-effect waves-light"data-bs-toggle="modal" data-bs-target="#categories" >
                {{ __('back.categories') }}
            </a>
            <a href="{{ route('CategoryOfProductArchives.index') }}" class="btn btn-soft-dark waves-effect waves-light">
                {{ __('back.archive') }}
            </a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>{{ __('back.image') }}</th>
                                <th>{{ __('back.name_ar') }}</th>
                                <th>{{ __('back.name_en') }}</th>
                                <th>{{ __('back.Product_Count') }}</th>
                                <th>{{ __('action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td><img src="{{asset($category->image) }}" width="50px" height="50px" alt=""></td>
                                    <td>{{ $category->name_ar }}</td>
                                    <td>{{ $category->name_en }}</td>
                                    <td>{{ $category->products->count() }}</td>
                                    <td>

                                        <a href="#" type="submit"
                                            class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#edit{{$category->id}}">
                                            <i class="fas fa-edit"></i> {{ __('back.edit') }}
                                        </a>
                                        <a href="{{ route('CategoryOfProduct.allproductbelong', $category->id) }}"
                                            type="submit" class="btn btn-primary">
                                            <i class="fas fa-allergies"></i> {{ __('back.allproductbelong') }}
                                        </a>
                                        <a href="#" type="submit"
                                            class="btn btn-danger"data-bs-toggle="modal" data-bs-target="#destroy{{$category->id}}">
                                            <i class="fas fa-trash"></i> {{ __('back.delete') }}
                                        </a>
                                    </td>
                                </tr>
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
                                                <form action="{{ route('CategoryOfProduct.update', 'test') }}" method="POST"
                                                    enctype="multipart/form-data" novalidate class="needs-validation">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <!-- name in Arabic -->
                                                        <div class="form-group col-md-6">
                                                            <label for="name_ar">{{ __('back.name_ar') }}</label>
                                                            <input type="text" class="form-control @error('name_ar') is-invalid @enderror"
                                                                id="name_ar" name="name_ar" value="{{ old('name_ar', $category->name_ar) }}">
                                                            @error('name_ar')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <!-- name in english -->
                                                        <div class="form-group col-md-6">
                                                            <label for="name_en">{{ __('back.name_en') }}</label>
                                                            <input type="text" class="form-control @error('name_en') is-invalid @enderror"
                                                                id="name_en" name="name_en" value="{{ old('name_en', $category->name_en) }}">
                                                            @error('name_en')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="">{{ __('back.count') }}</label>
                                                            <input type="text" class="form-control "id="" readonly name=""
                                                                value=" {{ $category->products->count() }}">
                                                        </div>
                                                        <!-- Image Upload -->
                                                        <div class="mb-3">
                                                            <label for="image" class="form-label">{{ __('back.image') }}</label>
                                                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                                                name="image" id="image">
                                                            @error('image')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                    <!-- Submit Button -->
                                                    <div class="form-group text-center mt-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('back.create_category') }}
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- delete_modal_Grade -->
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
                                                <form action="{{ route('CategoryOfProduct.destroy', 'test') }}" method="post">
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
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
    <div class="modal fade" id="categories" tabindex="-1" aria-labelledby="categories" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categories">
                        {{__('back.categories')}}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('CategoryOfProduct.store') }}" method="POST" enctype="multipart/form-data"
                    novalidate class="needs-validation">
                    @csrf
                    <div class="row">
                        <!-- name in Arabic -->
                        <div class="form-group col-md-6">
                            <label for="name_ar">{{ __('back.name_ar') }}</label>
                            <input type="text" class="form-control @error('name_ar') is-invalid @enderror"
                                id="name_ar" name="name_ar" value="{{ old('name_ar') }}">
                            @error('name_ar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- name in english -->
                        <div class="form-group col-md-6">
                            <label for="name_en">{{ __('back.name_en') }}</label>
                            <input type="text" class="form-control @error('name_en') is-invalid @enderror"
                                id="name_en" name="name_en" value="{{ old('name_en') }}">
                            @error('name_en')
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
                    <!-- Submit Button -->
                    <div class="form-group text-center mt-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('back.create_category') }}
                        </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <!-- DataTables -->
        <script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}">
        </script>
        <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>

        <!-- Initialize DataTables -->
        <script>
            $(document).ready(function() {
                $('#datatable').DataTable({
                    responsive: true,
                    lengthChange: true,
                    autoWidth: false,
                });
            });
        </script>
    @endpush
@endsection
