@extends('layouts.backend')
@section('content')
<div class="uk-card uk-card-body">
    <h3 class="uk-heading-divider uk-clearfix">Update Courses</h3>
    <div class="uk-margin uk-width-large uk-margin-auto">
		<form method="POST" action="{{ route('courses.update', $course->id) }}">
	        @csrf
			<div class="uk-margin">
				<label class="uk-form-label" for="form-stacked-text">Select category</label>
	            {{ Form::select('categories_id', $categories, $course->categories_id, ['placeholder' => 'Select category', 'class' => 'uk-select  uk-form-large']) }}
	            <p class="uk-margin-remove-top uk-text-small uk-text-danger">
	                @error('categories_id') {{ $message }} @enderror
	            </p>
	        </div>
	        <div class="uk-margin">
	            <div class="uk-inline uk-width-1-1">
					<label class="uk-form-label" for="form-stacked-text">Course Name</label>
	            	{{ Form::text('name', $course->name, ['required', 'autofocus', 'class' => 'uk-input uk-form-large '.($errors->has('name') ? 'uk-form-danger':'').'', 'placeholder' => 'Course Name']) }}
	            </div>
	            <p class="uk-margin-remove-top uk-text-small uk-text-danger">
	                @error('name') {{ $message }} @enderror
	            </p>
	        </div>
	        <div class="uk-margin">
	            <button type="submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1">{{ __('Update Courses') }}</button>
	        </div>
	    </form>
	</div>
</div>
@endsection