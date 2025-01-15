@include('backend.layouts.head')

<body class="loading authentication-bg authentication-bg-pattern">

    <div class="account-pages my-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="text-center">
                        <a href="{{ route('writer-login-page') }}">
                            <img src="{{ asset('logo.png') }}" alt="" class="mx-auto w-25">
                        </a>
                    </div>

                    <div class="card mt-2">
                        <div class="card-body p-4">

                            <div class="text-center mb-4">
                                <h4 class="text-uppercase mt-0">{{ __('front.Writer_Sign_In') }}</h4>
                            </div>

                            <form method="POST" action="{{ route('writer-login') }}">
                                @csrf

                                <!-- Email Address -->
                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">{{ __('back.email') }}</label>
                                    <input class="form-control" type="email" id="email" name="email"
                                        value="{{ old('email') }}" required autofocus autocomplete="username"
                                        placeholder="Enter your email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">{{ __('back.password') }}</label>
                                    <input class="form-control" type="password" id="password" name="password" required
                                        autocomplete="current-password" placeholder="Enter your password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <div class="mb-3 d-grid text-center">
                                    <button class="btn btn-primary" type="submit">Log In</button>
                                </div>

                            </form>

                        </div> <!-- end card-body -->
                        <div class="text-center">
                            <p class="text-muted">
                                Are you a writer?
                                <a href="{{ route('writer-register-page') }}" class="text-primary ms-1"><b>Register as
                                        Writer</b></a>
                            </p>
                            <p class="text-muted">
                                Are you an admin?
                                <a href="{{ route('login') }}" class="text-primary ms-1"><b>Log In as Admin</b></a>
                            </p>
                        </div><!-- end card -->
                    </div>

                </div> <!-- end col -->
            </div> <!-- end row -->

        </div>
        <!-- end container -->
    </div>

</body>
@include('backend.layouts.footer')
