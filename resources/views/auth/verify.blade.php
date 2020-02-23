@extends('layouts.frontend')
@section('content')
<div class="blocks">
    <h5 class="title">{{ __('Verify Your Email Address') }}</h5>
    <div class="content">
        @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
        @endif

        <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
        <p>{{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
        </p>
    </div>
</div>
@endsection
