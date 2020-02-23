@extends('layouts.backend')
@section('content')
<div class="uk-card uk-card-body uk-card-small">
    <h3 class="uk-heading-divider">Password Change</h3>
    <div class="uk-margin uk-width-large uk-margin-auto">
        <form method="POST" action="{{ route('password.change') }}">
            @csrf
            <div class="uk-margin">
                <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input id="current_password" class="uk-input uk-form-large @error('current_password') uk-form-danger @enderror" type="password" name="current_password" placeholder="{{ __('Current Password') }}" required autocomplete="new-password" autofocus>  
                </div>
	            <p class="uk-margin-remove-top uk-text-small uk-text-danger">
	                @error('current_password') {{ $message }} @enderror
	            </p>
            </div>
            <div class="uk-margin">
                <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input id="password" class="uk-input uk-form-large @error('password') uk-form-danger @enderror" type="password" name="password" placeholder="{{ __('New Password') }}" required autocomplete="new-password" autofocus>  
                </div>
	            <p class="uk-margin-remove-top uk-text-small uk-text-danger">
	                @error('password') {{ $message }} @enderror
	            </p>
            </div>
            <div class="uk-margin">
                <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input id="password-confirm" class="uk-input uk-form-large" type="password" name="password_confirmation" placeholder="{{ __('Retype Password') }}" required autocomplete="new-password">  
                </div>
                <p class="uk-margin-remove-top uk-text-small uk-text-danger">
                    @error('password_confirmation') {{ $message }} @enderror
                </p>
            </div>
            <div class="uk-margin">
                <button type="submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1">{{ __('Update Password') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection