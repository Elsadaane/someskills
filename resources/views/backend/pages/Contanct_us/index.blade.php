@extends('backend.layouts.master')

@section('title')
    {{ trans('back.contact_us') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mt-2">
            <h4 class="header-title">{{ trans('back.contact_us') }}</h4>
            <div class="card">
                <div class="card-box">
                    <!-- عرض جميع الأخطاء -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('Contact_us.update', $contact->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row m-4">

                            <!-- العمود الأول -->
                            <div class="col-md-6">
                                <div class="form-group mt-4">
                                    <label for="name_ar">name_ar</label>
                                    <input type="text" class="form-control" id="name_ar" name="name_ar"
                                        value="{{ old('name_ar', $contact->name_ar) }}">
                                    @error('name_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <label for="name_en">name_en</label>
                                    <input type="text" class="form-control" id="name_en" name="name_en"
                                        value="{{ old('name_en', $contact->name_en) }}">
                                    @error('name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- العمود الثاني -->
                            <div class="col-md-6">
                                <div class="form-group mt-4">
                                    <label for="email">email</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="{{ old('email', $contact->email) }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <label for="phone">phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        value="{{ old('phone', $contact->phone) }}">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- العمود الثالث -->
                            <div class="col-md-6">
                                <div class="form-group mt-4">
                                    <label for="subject_ar">subject_ar</label>
                                    <input type="text" class="form-control" id="subject_ar" name="subject_ar"
                                        value="{{ old('subject_ar', $contact->subject_ar) }}">
                                    @error('subject_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <label for="subject_en">subject_en</label>
                                    <input type="text" class="form-control" id="subject_en" name="subject_en"
                                        value="{{ old('subject_en', $contact->subject_en) }}">
                                    @error('subject_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- العمود الرابع -->
                            <div class="col-md-6">
                                <div class="form-group mt-4">
                                    <label for="message_ar">message</label>
                                    <input type="text" class="form-control" id="message_ar" name="message_ar"
                                        value="{{ old('message_ar', $contact->message_ar) }}">
                                    @error('message_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <label for="message_en">message_en</label>
                                    <input type="text" class="form-control" id="message_en" name="message_en"
                                        value="{{ old('message_en', $contact->message_en) }}">
                                    @error('message_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group col-md-12 mt-3">
                                <button type="submit" class="btn btn-success">{{ trans('back.Save_and_Update') }}</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
