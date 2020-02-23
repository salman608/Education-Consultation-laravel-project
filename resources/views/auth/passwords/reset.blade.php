@extends('layouts.frontend')
@section('content')
<div class="blocks">
    <h5 class="title">{{ __('Reset Password') }}</h5>
    <div class="content">
        <form method="POST" action="{{ route('password.update') }}">
            <input type="hidden" name="token" value="{{ $token }}">
            @csrf
            <div class="form-group">
                <label for="email">{{ __('E-Mail Address') }} <span class="text-danger">(Requied *)</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autocomplete="email" autofocus>
                <p id="email_help" class="form-text text-muted">@error('email') {{ $message }} @enderror</p>
            </div>

            <div class="form-group">
                <label for="password">{{ __('Password') }} <span class="text-danger">(Requied *)</span></label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="{{ __('Password') }}" autocomplete="new-password" autofocus>
                <p class="text-danger">Your password must be 8 characters long</p>
                <p id="password_help" class="form-text text-muted error_password">@error('password') {{ $message }} @enderror</p>
            </div>

            <div class="form-group">
                <label for="password_confirmation">{{ __('Retype Password') }} <span class="text-danger">(Requied *)</span></label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="{{ __('Retype Password') }}" autocomplete="new-password">
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Reset Password') }}</button>
        </form>
    </div>
</div>
@endsection
