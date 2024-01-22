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
                                <h5 class="text-white font-size-20">Welcome Back !</h5>
                                <p class="text-white-50 mb-0">{{ __('Login') }} to continue to OMS.</p>
                                <a href="{{url('/')}}" class="logo logo-admin mt-4">
                                    <img src="{{asset('backend-assets/images/logo-sm-dark.png')}}" alt="" height="30">
                                </a>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            <div class="p-2">
                                <form class="form-horizontal" method="post" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="username">{{ __('E-Mail Address') }}</label>
                                        <input id="email" type="email" placeholder="Enter Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Password</label>
                                        <input id="password" placeholder="Enter password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="customControlInline">Remember
                                            me</label>
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">{{ __('Login') }}</button>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <div class="mt-4 text-center">
{{--                                            <a href="{{ route('password.request') }}" class="text-muted"><i--}}
{{--                                                    class="mdi mdi-lock me-1"></i>{{ __('Forgot Your Password?') }}</a>--}}
                                        </div>
                                    @endif
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">
{{--                        <p>Don't have an account ? <a href="{{route('register')}}"--}}
{{--                                                      class="fw-medium text-primary"> Signup now </a> </p>--}}
                        <p>©
                            <script>document.write(new Date().getFullYear())</script> Organisation Management System
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
