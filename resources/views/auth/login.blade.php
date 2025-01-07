@extends(get_auth_template_base_path() . '.layouts.app')

@section('title', __('Sign In'))

@section('content')
    <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
        <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
            <div class="my-5 d-flex justify-content-center">
                <a href="index.html">
                    <img src="{{ asset(get_admin_template_base_path() . '/images/brand-logos/desktop-logo.png') }}"
                        alt="logo" class="desktop-logo">
                    <img src="{{ asset(get_admin_template_base_path() . '/images/brand-logos/desktop-dark.png') }}"
                        alt="logo" class="desktop-dark">
                </a>
            </div>
            <div class="card custom-card">
                <div class="card-body p-5">
                    <p class="h5 fw-semibold mb-2 text-center">{{ __('Sign In') }}</p>
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="row gy-3">
                            <div class="col-xl-12">
                                <label for="email" class="form-label text-default">{{ __('Email') }}</label>
                                <input type="text" tabindex="1"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" id="email" placeholder="{{ __('Email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xl-12 mb-2">
                                <label for="password" class="form-label text-default d-block">{{ __('Password') }}
                                    <a href="reset-password-basic.html"
                                        class="float-end text-danger">{{ __('Forget Password?') }}
                                    </a>
                                </label>
                                <div class="input-group @error('password') is-invalid @enderror">
                                    <input type="password" class="form-control form-control-lg" name="password"
                                        tabindex="2" id="password" placeholder="{{ __('Password') }}">
                                    <button class="btn btn-light" type="button" onclick="createpassword('password',this)"
                                        id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" value=""
                                            id="remember_me">
                                        <label class="form-check-label text-muted fw-normal" for="remember_me">
                                            {{ __('Remember Me?') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 d-grid mt-2">
                                <button type="submit" class="btn btn-lg btn-primary" tabindex="3">
                                    {{ __('Sign In') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="text-center">
                        <p class="fs-12 text-muted mt-3">{{ __('Dont have an account?') }} <a
                                href="{{ route('register') }}" class="text-primary" tabindex="4">{{ __('Sign Up') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
