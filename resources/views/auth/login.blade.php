@include('backend.layouts.head')

<body class="loading authentication-bg authentication-bg-pattern">

    <div class="account-pages my-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="text-center">
                        <a href="index.html">
                            <img src="{{ asset('logo.png') }}" alt="" class="mx-auto w-25">
                        </a>
                    </div>

                    <div class="card mt-2">
                        <div class="card-body p-4">

                            <div class="text-center mb-4">
                                <h4 class="text-uppercase mt-0">Sign In</h4>
                            </div>

                            <form method="POST" action="{{ route('login') }}">
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

                                <!-- Remember Me -->
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="remember_me"
                                            name="remember">
                                        <label class="form-check-label" for="remember_me">Remember me</label>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="mb-3 d-grid text-center">
                                    <button class="btn btn-primary" type="submit">Log In</button>
                                </div>

                                <!-- Forgot Password Link -->
                                @if (Route::has('password.request'))
                                    <div class="text-center">
                                        <a href="{{ route('password.request') }}" class="text-muted">
                                            <i class="fa fa-lock me-1"></i> Forgot your password?
                                        </a>
                                    </div>
                                @endif

                            </form>

                        </div> <!-- end card-body -->
                        <div class="text-center">
                            <p class="text-muted">
                                Are you a writer?
                                <a href="{{ route('writer-login-page') }}" class="text-primary ms-1"><b>Sign Up as a
                                        Writer</b></a>
                                or
                                <a href="{{ route('writer-register-page') }}" class="text-primary ms-1"><b>Log In as a
                                        Writer</b></a>
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
