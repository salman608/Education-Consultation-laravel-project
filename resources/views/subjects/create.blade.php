@extends('layouts.backend')
@section('content')
<div class="uk-card uk-card-body">
    <h3 class="uk-heading-divider uk-clearfix">Create Subject</h3>
    <div class="uk-margin uk-width-large uk-margin-auto">
		<form method="POST" action="{{ route('subjects.store') }}">
	        @csrf
			<div class="uk-margin">
				<label class="uk-form-label" for="form-stacked-text">Select category</label>
	            {{ Form::select('categories_id', $categories, null, ['id' => 'categories_id', 'placeholder' => 'Select category', 'class' => 'uk-select  uk-form-large']) }}
	            <p class="uk-margin-remove-top uk-text-small uk-text-danger">
	                @error('categories_id') {{ $message }} @enderror
	            </p>
	        </div>
			<div class="uk-margin">
				<label class="uk-form-label" for="form-stacked-text">Select course</label>
	            {{ Form::select('courses_id', [], null, ['id' => 'courses_id', 'placeholder' => 'Select course', 'class' => 'uk-select  uk-form-large']) }}
	            <p class="uk-margin-remove-top uk-text-small uk-text-danger">
	                @error('courses_id') {{ $message }} @enderror
	            </p>
	        </div>
	        <div class="uk-margin">
	            <div class="uk-inline uk-width-1-1">
					<label class="uk-form-label" for="form-stacked-text">Subject Name</label>
	                <input id="name" class="uk-input uk-form-large @error('name') uk-form-danger @enderror" type="text" name="name" placeholder="{{ __('Subject Name') }}" required autofocus>  
	            </div>
	            <p class="uk-margin-remove-top uk-text-small uk-text-danger">
	                @error('name') {{ $message }} @enderror
	            </p>
	        </div>
	        <div class="uk-margin">
	            <button type="submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1">{{ __('Create Subject') }}</button>
	        </div>
	    </form>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#categories_id").change(function(){
	    var categories_id = $(this).val();
	    var initselcourse = '<option selected="selected" value="">Select course</option>';
	    var initselsubject = '';
	    $("#courses_id").html(initselcourse);
	    $("#subjects_id").html(initselsubject);
	    
	    if (categories_id != "") {
	        axios.get('{{ route("get_cources") }}/'+categories_id)
	        .then(function (response) {
	            var opt = [];
	            opt.push(initselcourse);
	            $.each(response.data, function (key, value) {
	                opt.push('<option value="' + key + '">' + value + '</option>');
	            });
	            $("#courses_id").html(opt);
	        })
	        .catch(function (error) {
	            console.log(error);
	        });
	    }
	});
	$("#categories_id").trigger('change');
});
</script>
@endsection