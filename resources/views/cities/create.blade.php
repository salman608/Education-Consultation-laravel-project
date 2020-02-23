@extends('layouts.backend')
@section('content')
<div class="uk-card uk-card-body">
    <h3 class="uk-heading-divider uk-clearfix">Create Cities</h3>
    <div class="uk-margin uk-width-large uk-margin-auto">
		<form method="POST" action="{{ route('cities.store') }}">
	        @csrf
	        <div class="uk-margin">
	            <div class="uk-inline uk-width-1-1">
					<label class="uk-form-label" for="form-stacked-text">City Name</label>
	                <input id="name" class="uk-input uk-form-large @error('name') uk-form-danger @enderror" type="text" name="name" placeholder="{{ __('City Name') }}" required autofocus>  
	            </div>
	            <p class="uk-margin-remove-top uk-text-small uk-text-danger">
	                @error('name') {{ $message }} @enderror
	            </p>
	        </div>
	        <div class="uk-margin">
	            <button type="submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1">{{ __('Create Cities') }}</button>
	        </div>
	    </form>
	</div>
</div>
@endsection