@extends('frontend.layouts.master')
@section('title', __('back.Contact Us'))
@section('content')

    <main class="main">

        <!-- Page Title -->
        <div class="page-title gradient-background text-white">
            <div class="container text-center">
                <nav class="breadcrumbs d-flex justify-content-center mb-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('Category') }}" class="text-light">@lang('back.Home')</a>
                        </li>
                        <li class="breadcrumb-item active">@lang('back.Contact Us')</li>
                    </ol>
                </nav>
                <h1 class="fw-bold display-5">@lang('back.contact_us')</h1>
            </div>
        </div>
        <!-- End Page Title -->

        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <!-- Form Title -->
                            <h2 class="text-primary fw-bold mb-4">@lang('back.Get in Touch')</h2>

                            <!-- Contact Form -->
                            <form action="{{ route('contact.submit') }}" method="POST">
                                @csrf
                                <!-- Name -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">@lang('back.Name')</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="{{ app()->getLocale() === 'ar' ? 'أدخل اسمك' : 'Enter your name' }}"
                                        required>
                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">@lang('back.Email')</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="{{ app()->getLocale() === 'ar' ? 'أدخل بريدك الإلكتروني' : 'Enter your email' }}"
                                        required>
                                </div>

                                <!-- Phone -->
                                <div class="mb-3">
                                    <label for="phone" class="form-label">@lang('back.Phone')</label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        placeholder="{{ app()->getLocale() === 'ar' ? 'أدخل رقم هاتفك' : 'Enter your phone number' }}">
                                </div>

                                <!-- Subject -->
                                <div class="mb-3">
                                    <label for="subject" class="form-label">@lang('back.Subject')</label>
                                    <select name="subject" id="subject" class="form-select">
                                        <option value="" disabled selected>
                                            {{ app()->getLocale() === 'ar' ? 'اختر موضوعاً' : 'Choose a subject' }}
                                        </option>
                                        <option value="general">
                                            {{ app()->getLocale() === 'ar' ? 'استفسار عام' : 'General Inquiry' }}
                                        </option>
                                        <option value="support">
                                            {{ app()->getLocale() === 'ar' ? 'الدعم الفني' : 'Technical Support' }}
                                        </option>
                                        <option value="feedback">
                                            {{ app()->getLocale() === 'ar' ? 'ملاحظات' : 'Feedback' }}
                                        </option>
                                    </select>
                                </div>

                                <!-- Message -->
                                <div class="mb-3">
                                    <label for="message" class="form-label">@lang('back.Message')</label>
                                    <textarea name="message" id="message" rows="5" class="form-control"
                                        placeholder="{{ app()->getLocale() === 'ar' ? 'اكتب رسالتك هنا' : 'Write your message here' }}" required></textarea>
                                </div>

                                <!-- Submit Button -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">@lang('back.Send Message')</button>
                                </div>
                            </form>
                            <!-- End Contact Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
