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
                                <h4 class="text-uppercase mt-0">Writer Registration</h4>
                            </div>

                            <form method="POST" action="{{ route('writer-register') }}">
                                @csrf

                                <!-- Name -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input class="form-control" type="text" id="name" name="name"
                                        value="{{ old('name') }}" required autofocus placeholder="Enter your name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Email Address -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input class="form-control" type="email" id="email" name="email"
                                        value="{{ old('email') }}" required placeholder="Enter your email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input class="form-control" type="password" id="password" name="password" required
                                        placeholder="Create a password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Confirm Password -->
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input class="form-control" type="password" id="password_confirmation"
                                        name="password_confirmation" required placeholder="Confirm your password">
                                </div>

                                <!-- Submit Button -->
                                <div class="mb-3 d-grid text-center">
                                    <button class="btn btn-primary" type="submit">Register</button>
                                </div>

                                <!-- Login Link -->
                                <div class="text-center">
                                    <p class="text-muted">Already have an account?
                                        <a href="{{ route('writer-login-page') }}" class="text-primary ms-1"><b>Log
                                                In</b></a>
                                    </p>
                                </div>

                            </form>

                        </div> <!-- end card-body -->
                    </div> <!-- end card -->

                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- end container -->
    </div>

</body>
@include('backend.layouts.footer')
