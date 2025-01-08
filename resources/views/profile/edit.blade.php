@extends('backend.layouts.master')

@section('title')
    {{ __('back.My_account') }}
@endsection

@section('content')
    <div class="mt-5">
        <!-- Profile Information Section -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h4>تحديث معلومات الملف الشخصي</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>
        </div>

        <!-- Password Update Section -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h4>تحديث كلمة المرور</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete User Section -->
        <div class="card mb-4">
            <div class="card-header bg-danger text-white">
                <h4>حذف الحساب</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
