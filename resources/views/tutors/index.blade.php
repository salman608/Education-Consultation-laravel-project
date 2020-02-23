@extends('layouts.backend')
@section('content')
<div class="uk-card uk-card-body">
    <h3 class="uk-card-title">Tutor's</h3>
	<form id="tuitionFindtionForm" action="javaScript:;">
		@csrf
		<div class="uk-grid-small" uk-grid>
			<div class="uk-width-1-3@s uk-margin uk-margin-small-bottom">
				<label class="uk-form-label" for="tutor_id">Tutor Id</label>
	            {{ Form::text('tutor_id', null, ['id' => 'tutor_id', 'class' => 'uk-input', 'placeholder' => 'Tutor Id']) }}
	            <p class="uk-margin-remove-top uk-text-small uk-text-danger error tutor_id">
	                @error('tutor_id') {{ $message }} @enderror
	            </p>
	        </div>
	        <div class="uk-width-1-3@s uk-margin uk-margin-small-top uk-margin-small-bottom">
	        	<label class="uk-form-label" for="tutor_name">Tutor Name</label>
	        	{{ Form::text('tutor_name', null, ['id' => 'tutor_name', 'class' => 'uk-input', 'placeholder' => 'Tutor Name']) }}
	            <p class="uk-margin-remove-top uk-text-small uk-text-danger error tutor_name">
	                @error('tutor_name') {{ $message }} @enderror
	            </p>
	        </div>
			<div class="uk-width-1-3@s uk-margin uk-margin-small-top uk-margin-small-bottom">
				<label class="uk-form-label" for="registration_date">Registration Date</label>
	            {{ Form::text('registration_date', null, ['id' => 'registration_date', 'class' => 'uk-input datepick', 'placeholder' => 'Registration Date']) }}
	            <p class="uk-margin-remove-top uk-text-small uk-text-danger error registration_date">
	                @error('registration_date') {{ $message }} @enderror
	            </p>
	        </div>
	        <div class="uk-width-1-1@s uk-margin uk-margin-small-top uk-margin-small-bottom">
	        	<label class="uk-form-label" for="institute_name">Institute Name.</label>
	        	{{ Form::text('institute_name', null, ['id' => 'institute_name', 'class' => 'uk-input', 'placeholder' => 'Institute Name']) }}
	            <p class="uk-margin-remove-top uk-text-small uk-text-danger error institute_name">
	                @error('institute_name') {{ $message }} @enderror
	            </p>
	        </div>
			<div class="uk-width-1-3@s uk-margin uk-margin-small-top uk-margin-small-bottom">
				<label class="uk-form-label" for="categories_id">Select Category</label>
	            {{ Form::select('categories_id', (!empty($categories)) ? $categories : [], null, ['placeholder' => 'Select Category', 'id' => 'categories_id', 'class' => 'uk-select']) }}
	            <p class="uk-margin-remove-top uk-text-small uk-text-danger error categories_id">
	                @error('categories_id') {{ $message }} @enderror
	            </p>
	        </div>
	        <div class="uk-width-1-3@s uk-margin uk-margin-small-top uk-margin-small-bottom">
	        	<label class="uk-form-label" for="courses_id">Class / Course</label>
	        	{{ Form::select('courses_id', (!empty($selected_courses)) ? $selected_courses : [], null, ['placeholder' => 'Select Class / Course', 'id' => 'courses_id', 'class' => 'uk-select']) }}
	            <p class="uk-margin-remove-top uk-text-small uk-text-danger error courses_id">
	                @error('courses_id') {{ $message }} @enderror
	            </p>
	        </div>
			<div class="uk-width-1-3@s uk-margin uk-margin-small-top uk-margin-small-bottom">
				<label class="uk-form-label" for="subjects_id">Select Subjects</label>
	            {{ Form::select('subjects_id', (!empty($selected_subject)) ? $selected_subject : [], null, ['placeholder' => 'Select Subjects', 'id' => 'subjects_id', 'class' => 'uk-select']) }}
	            <p class="uk-margin-remove-top uk-text-small uk-text-danger error subjects_id">
	                @error('subjects_id') {{ $message }} @enderror
	            </p>
	        </div>
		    <div class="uk-width-1-3@s uk-margin uk-margin-small-top uk-margin-small-bottom">
		    	<label class="uk-form-label" for="city_id">City</label>
	            {{ Form::select('city_id', (!empty($cities)) ? $cities : [], null, ['placeholder' => 'Select City', 'id' => 'city_id', 'class' => 'uk-select']) }}
	            <p class="uk-margin-remove-top uk-text-small uk-text-danger error city_id">
	                @error('city_id') {{ $message }} @enderror
	            </p>
		    </div>
		    <div class="uk-width-1-3@s uk-margin uk-margin-small-top uk-margin-small-bottom">
		    	<label class="uk-form-label" for="locations_id">Your location</label>
	            {{ Form::select('locations_id', (!empty($selected_locations)) ? $selected_locations : [], null, ['placeholder' => 'Select Location', 'id' => 'locations_id', 'class' => 'uk-select']) }}
	            <p class="uk-margin-remove-top uk-text-small uk-text-danger error locations_id">
	                @error('locations_id') {{ $message }} @enderror
	            </p>
		    </div>
		    <div class="uk-width-1-3@s">
			    <legend class="uk-legend uk-text-small uk-text-bold">Gender</legend>
		        <div class="uk-margin">
		            <label>{{ Form::radio('gender', 'Any', true, ['class' => 'uk-radio']) }} Any</label>
		            <label>{{ Form::radio('gender', 'Male', false, ['class' => 'uk-radio']) }} Male</label>
		            <label>{{ Form::radio('gender', 'Female', false, ['class' => 'uk-radio']) }} Female</label>
		        </div>
		    </div>
	        <div class="uk-width-1-1@s uk-margin uk-margin-small-top uk-margin-small-bottom">
	        	<button type="submit" class="uk-button uk-button-primary">Find</button>
	        </div>
	    </div>
	</form>
	<hr class="uk-divider-icon">
    <div id="find_tutors"></div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#city_id").change(function(){
        var city_id = $(this).val();
        var initsellocation = '<option selected="selected" value="">Select Location</option>';
        $("#locations_id").html(initsellocation);
        
        if (city_id != "") {
            axios.get('{{ route("get_locations") }}/'+city_id)
            .then(function (response) {
                var opt = [];
                opt.push(initsellocation);
                $.each(response.data, function (key, value) {
                    opt.push('<option value="' + key + '">' + value + '</option>');
                });
                $("#locations_id").html(opt);
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    });

    $("#categories_id").change(function(){
        var categories_id = $(this).val();
        var initselcourse = '<option selected="selected" value="">Select Class / Course</option>';
        var initselsubject = '<option selected="selected" value="">Select Subjects</option>';
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

    $("#courses_id").change(function(){
        var courses_id = $(this).val();
        var initselsubject = '<option selected="selected" value="">Select Subjects</option>';
        $("#subjects_id").html(initselsubject);
        
        if (courses_id != "") {
            axios.get('{{ route("get_subjects") }}/'+courses_id)
            .then(function (response) {
                var opt = [];
                opt.push(initselsubject);
                $.each(response.data, function (key, value) {
                    opt.push('<option value="' + key + '">' + value + '</option>');
                });
                $("#subjects_id").html(opt);
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    });

    $("#tuitionFindtionForm").submit(function() {
        axios.post('{{ route("tutors.find_tutors") }}', $(this).serialize())
	    .then(function (response) {
	        console.log(response);
	        $('#find_tutors').html(response.data);
	    })
	    .catch(function (error) {
	        console.log(error.response);
	    });
    });
});
</script>
@endsection