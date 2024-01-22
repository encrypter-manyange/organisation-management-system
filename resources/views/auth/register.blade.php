@extends('layouts.auth')

@section('content')
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-login text-center">
                            <div class="bg-login-overlay"></div>
                            <div class="position-relative">
                                <h5 class="text-white font-size-20">Free Register</h5>
                                <p class="text-white-50 mb-0">Get your free Webantico account now!</p>
                                <a href="{{url('/')}}" class="logo logo-admin mt-4">
                                    <img src="{{asset('assets/images/logo-sm-dark.png')}}" alt="" height="30">
                                </a>
                            </div>
                        </div>
                        <div class="card-body pt-5">

                            <div class="p-2">
                                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Username</label>
                                        <input id="name" type="text" placeholder="Enter Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                             </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email Address</label>
                                        <input id="email" placeholder="Enter Email Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Password</label>
                                        <input id="password" placeholder="Enter Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="confirm-password">Confirm Password</label>
                                        <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn btn-primary w-100 waves-effect waves-light"
                                                type="submit">{{ __('Register') }}</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <p class="mb-0">By registering you agree to the Webantico <a href="#"
                                                                                                 class="text-primary">Terms of Use</a></p>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Already have an account ? <a href="{{route('login')}}" class="fw-medium text-primary">
                                Login</a> </p>
                        <p>©
                            <script>document.write(new Date().getFullYear())</script> Webantico Marketplace.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
