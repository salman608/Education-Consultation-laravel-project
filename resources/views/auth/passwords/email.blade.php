@extends('layouts.frontend')
@section('content')
<div class="blocks">
    <h5 class="title">{{ __('Forgot Password') }}</h5>
    <div class="content">
        @if (session('status'))
        <div class="alert alert-danger" role="alert">{{ session('status') }}</div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group">
                <label for="email">{{ __('E-Mail Address') }} <span class="text-danger">(Requied *)</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autocomplete="email" autofocus>
                <p id="email_help" class="form-text text-muted">@error('email') {{ $message }} @enderror</p>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Reset Password') }}</button>
        </form>
    </div>
</div>
@endsection
