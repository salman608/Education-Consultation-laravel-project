@extends('layouts.frontend')
@section('content')
<div class="blocks login" style="max-width: 480px;">
    <h5 class="title">{{ __('Sign In') }}</h5>
    <div class="content">
        <form class="" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">{{ __('E-Mail Address') }} <span class="text-danger">(Requied *)</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autocomplete="email" autofocus>
                <p id="email_help" class="form-text text-muted">@error('email') {{ $message }} @enderror</p>
            </div>
            <div class="form-group">
                <label for="password">{{ __('Password') }} <span class="text-danger">(Requied *)</span></label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">
                <p id="password_help" class="form-text text-muted">@error('password') {{ $message }} @enderror</p>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
            @endif
        </form>
    </div>
    <div class="content">
        <a class="btn btn-success register_tutor" href="{{ route('register.tutor') }}">{{ __('Tutor Registration') }}</a>
        <a class="btn btn-success register_guardian" href="{{ route('register') }}">{{ __('Guardian Registration') }}</a>
    </div>
</div>
@endsection
