@extends(get_auth_template_base_path() . '.layouts.app')

@section('title', __('Register'))

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
                    <p class="h5 fw-semibold mb-2 text-center">{{ __('Register') }}</p>
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="row gy-3">
                            <div class="col-xl-12">
                                <label for="name" class="form-label text-default">{{ __('Name') }}</label>
                                <input type="text" tabindex="1"
                                    class="form-control form-control-lg @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" id="name" placeholder="{{ __('Name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xl-12">
                                <label for="email" class="form-label text-default">{{ __('Email') }}</label>
                                <input type="text" tabindex="2"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" id="email" placeholder="{{ __('Email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xl-12 mb-2">
                                <label for="password" class="form-label text-default d-block">{{ __('Password') }}</label>
                                <input type="password"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                    name="password" tabindex="3" id="password" placeholder="{{ __('Password') }}">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xl-12 mb-2">
                                <label for="password_confirmation"
                                    class="form-label text-default d-block">{{ __('Confirm Password') }}</label>
                                <input type="password"
                                    class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" tabindex="4" id="password_confirmation"
                                    placeholder="{{ __('Confirm Password') }}">
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xl-12 d-grid mt-2">
                                <button type="submit" class="btn btn-lg btn-primary" tabindex="5">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="text-center">
                        <p class="fs-12 text-muted mt-3">{{ __('Already registered?') }} <a href="{{ route('login') }}"
                                class="text-primary" tabindex="6">{{ __('Sign In') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
