@extends('backend.layouts.master')
@section('title', 'Category Of Product')
@section('content')
    <div class="row">
        <h4 class="header-title mt-2">{{ __('back.category') }}</h4>
        <div class="d-flex mb-3">
            <a href="{{ route('CategoryOfProduct.create') }}" class="btn btn-soft-success waves-effect waves-light">
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
                                    <td>{{ $category->image }}</td>
                                    <td>{{ $category->name_ar }}</td>
                                    <td>{{ $category->name_en }}</td>
                                    <td>{{ $category->products->count() }}</td>
                                    <td>

                                        <a href="{{ route('CategoryOfProduct.edit', $category->id) }}" type="submit"
                                            class="btn btn-primary">
                                            <i class="fas fa-edit"></i> {{ __('back.edit') }}
                                        </a>
                                        <a href="{{ route('CategoryOfProduct.allproductbelong', $category->id) }}"
                                            type="submit" class="btn btn-primary">
                                            <i class="fas fa-allergies"></i> {{ __('back.allproductbelong') }}
                                        </a>

                                        <form action="{{ route('CategoryOfProduct.destroy', $category->id) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE') <!-- استخدم DELETE للحذف -->
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this?')">
                                                <i class="fas fa-trash"></i> {{ __('back.delete') }}
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