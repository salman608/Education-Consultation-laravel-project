@extends('layouts.backend')
@section('content')
<div class="uk-card uk-card-body">
    <h3 class="uk-heading-divider uk-clearfix">Update Categories</h3>
    <div class="uk-margin uk-width-large uk-margin-auto">
		<form method="POST" action="{{ route('categories.update', $category->id) }}">
	        @csrf
	        <div class="uk-margin">
	            <div class="uk-inline uk-width-1-1">
					<label class="uk-form-label" for="form-stacked-text">Category Name</label>
	            	{{ Form::text('name', $category->name, ['required', 'autofocus', 'class' => 'uk-input uk-form-large '.($errors->has('name') ? 'uk-form-danger':'').'', 'placeholder' => 'Category Name']) }}
	            </div>
	            <p class="uk-margin-remove-top uk-text-small uk-text-danger">
	                @error('name') {{ $message }} @enderror
	            </p>
	        </div>
	        <div class="uk-margin">
	            <button type="submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1">{{ __('Update Categories') }}</button>
	        </div>
	    </form>
	</div>
</div>
@endsection