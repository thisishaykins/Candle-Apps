@extends('layouts.app')

@section('content')
<!-- login area start -->
    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--00">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="login-form-head">
                        <h4>{{ __('Sign up') }}</h4>
                        <p>Hello there, Sign up and Join with Us @Candle</p>
                    </div>

                    <div class="login-form-body">

                        <div class="form-gp">
                            <label for="InputName">{{ __('Full Name') }}</label>
                            <input type="text" id="InputName" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                            <i class="ti-user"></i>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-gp">
                            <label for="InputEmail">{{ __('E-Mail Address') }}</label>
                            <input type="email" id="InputEmail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            <i class="ti-email"></i>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                         <div class="form-gp">
                            <label for="InputPhone">{{ __('Phone Number') }}</label>
                            <input id="InputPhone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>
                            <i class="ti-email"></i>

                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-gp">
                            <label for="InputPassword">{{ __('Password') }}</label>
                            <input type="password" id="InputPassword" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            <i class="ti-lock"></i>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-gp">
                            <label for="InputPassword2">{{ __('Confirm Password') }}</label>
                            <input type="password" id="InputPassword2" class="form-control" name="password_confirmation" required>
                            <i class="ti-lock"></i>
                        </div>

                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">{{ __('Register') }} <i class="ti-arrow-right"></i></button>
                            <div class="login-other row mt-4" style="display: none;">
                                <div class="col-6">
                                    <a class="fb-login" href="#">Sign up with <i class="fa fa-facebook"></i></a>
                                </div>
                                <div class="col-6">
                                    <a class="google-login" href="#">Sign up with <i class="fa fa-google"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Don't have an account? <a href="{{ route('login') }}">Sign in</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- login area end -->
@endsection
