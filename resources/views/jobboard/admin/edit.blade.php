@extends('layouts.backend')
@section('content')
<div class="uk-card uk-card-body">
    <h3 class="uk-heading-divider uk-clearfix">Edit Need a {{ (!empty($job->relCategories->name)) ? $job->relCategories->name : $empty }} - {{ (!empty($job->relCourse->name)) ? $job->relCourse->name : $empty }} Tutor</h3>
    <form id="updateTutionJobForm" action="javaScript:;">
        @csrf
        <div class="uk-margin">
            <div class="uk-inline uk-width-1-1">
                <label class="uk-form-label uk-text-bold" for="job_id">Tution ID</label>
                <input id="job_id" class="uk-input uk-form-large @error('job_id') uk-form-danger @enderror" type="text" name="job_id" placeholder="{{ __('Tution ID') }}" value="{{ (!empty($job->job_id)) ? $job->job_id : '' }}">  
            </div>
            <p class="uk-margin-remove-top uk-text-danger error job_id">
                @error('job_id') {{ $message }} @enderror
            </p>
        </div>
        <div class="uk-grid-small" uk-grid>
            <div class="uk-width-1-2@s">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <label class="uk-form-label uk-text-bold" for="city_id">Select City <span class="uk-text-danger">(Requied *)</span></label>
                        {{ Form::select('city_id', $cities, (!empty($job->city_id)) ? $job->city_id : null, ['placeholder' => 'Select City', 'id' => 'city_id', 'class' => 'uk-select uk-form-large '.($errors->has('city_id') ? 'uk-form-danger':'').'']) }}
                    </div>
                    <p class="uk-margin-remove-top uk-text-danger error city_id">
                        @error('city_id') {{ $message }} @enderror
                    </p>
                </div>
            </div>
            <div class="uk-width-1-2@s">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <label class="uk-form-label uk-text-bold" for="locations_id">Select Location <span class="uk-text-danger">(Requied *)</span></label>
                        {{ Form::select('locations_id', $selected_locations, (!empty($job->locations_id)) ? $job->locations_id : null, ['placeholder' => 'Select Location', 'id' => 'locations_id', 'class' => 'uk-select uk-form-large '.($errors->has('locations_id') ? 'uk-form-danger':'').'']) }}
                    </div>
                    <p class="uk-margin-remove-top uk-text-danger error locations_id">
                        @error('locations_id') {{ $message }} @enderror
                    </p>
                </div>
            </div>
        </div>
        <div class="uk-grid-small" uk-grid>
            <div class="uk-width-1-2@s">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <label class="uk-form-label uk-text-bold" for="categories_id">Select Category <span class="uk-text-danger">(Requied *)</span></label>
                        {{ Form::select('categories_id', $categories, (!empty($job->categories_id)) ? $job->categories_id : null, ['placeholder' => 'Select Category', 'id' => 'categories_id', 'class' => 'uk-select uk-form-large '.($errors->has('categories_id') ? 'uk-form-danger':'').'']) }}
                    </div>
                    <p class="uk-margin-remove-top uk-text-danger error categories_id">
                        @error('categories_id') {{ $message }} @enderror
                    </p>
                </div>
            </div>
            <div class="uk-width-1-2@s">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <label class="uk-form-label uk-text-bold" for="courses_id">Select Class/Course <span class="uk-text-danger">(Requied *)</span></label>
                        {{ Form::select('courses_id', $selected_courses, (!empty($job->courses_id)) ? $job->courses_id : null, ['placeholder' => 'Select Class/Course', 'id' => 'courses_id', 'class' => 'uk-select uk-form-large '.($errors->has('courses_id') ? 'uk-form-danger':'').'']) }}
                    </div>
                    <p class="uk-margin-remove-top uk-text-danger error courses_id">
                        @error('courses_id') {{ $message }} @enderror
                    </p>
                </div>
            </div>
        </div>
        <div class="uk-grid-small" uk-grid>
            <div class="uk-width-1-2@s">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <label class="uk-form-label uk-text-bold" for="student_gender">Select Student Gender <span class="uk-text-danger">(Requied *)</span></label>
                        {{ Form::select('student_gender', ['male' => 'Male', 'female' => 'Female'], (!empty($job->student_gender)) ? $job->student_gender : null, ['placeholder' => 'Select Student Gender', 'id' => 'student_gender', 'class' => 'uk-select uk-form-large '.($errors->has('student_gender') ? 'uk-form-danger':'').'']) }}
                    </div>
                    <p class="uk-margin-remove-top uk-text-danger error student_gender">
                        @error('student_gender') {{ $message }} @enderror
                    </p>
                </div>
            </div>
            <div class="uk-width-1-2@s">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <label class="uk-form-label uk-text-bold" for="institute_name">Institute Name <span class="uk-text-danger">(Requied *)</span></label>
                        <input id="institute_name" class="uk-input uk-form-large @error('institute_name') uk-form-danger @enderror" type="text" name="institute_name" placeholder="{{ __('Institute Name') }}" value="{{ (!empty($job->institute_name)) ? $job->institute_name : '' }}">  
                    </div>
                    <p class="uk-margin-remove-top uk-text-danger error institute_name">
                        @error('institute_name') {{ $message }} @enderror
                    </p>
                </div>
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label uk-text-bold" for="subjects_id">Select Subjects <span class="uk-text-danger">(Requied *)</span></label>
            <div class="uk-margin">
                <label class="uk-text-bold"><input class="uk-checkbox" type="checkbox" id="checkall" {{ (count($selected_subject) == count($job->relJbSubject)) ? 'checked' : '' }}> Check All</label>
                <span id="subjects_id">
                	@if(!empty($selected_subject))
				    	@foreach($selected_subject as $suject)
				    		<label class="uk-margin-small-left"><input class="uk-checkbox select_subject_checkbox" type="checkbox" name="subjects_id[]" value="{{ $suject->id }}" {{ (in_array($suject->id, $subject_id)) ? 'checked' : '' }} > {{ $suject->name }}</label>
				    	@endforeach
                	@endif
                </span>
            </div>
            <p class="uk-margin-remove-top uk-text-danger error subjects_id">
                @error('subjects_id') {{ $message }} @enderror
            </p>
        </div>
        <div class="uk-margin" id="curriculums" style="{{ (empty($job->curriculum)) ? 'display: none;' : '' }}">
            <label class="uk-form-label uk-text-bold" for="curriculum">Select Curriculum <span class="uk-text-danger">(Requied *)</span></label>
            <div class="uk-margin">
                <label class="uk-text-bold"><input class="uk-radio" type="radio" name="curriculum" value="Cambridge" {{ ($job->curriculum == 'Cambridge') ? 'checked' : '' }}> Cambridge</label>
                <label class="uk-text-bold"><input class="uk-radio" type="radio" name="curriculum" value="Ed-excel" {{ ($job->curriculum == 'Ed-excel') ? 'checked' : '' }}> Ed-excel</label>
                <label class="uk-text-bold"><input class="uk-radio" type="radio" name="curriculum" value="IB" {{ ($job->curriculum == 'IB') ? 'checked' : '' }}> IB</label>
            </div>
            <p class="uk-margin-remove-top uk-text-danger error curriculum">
                @error('curriculum') {{ $message }} @enderror
            </p>
        </div>
        <div class="uk-grid-small" uk-grid>
            <div class="uk-width-1-2@s">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <label class="uk-form-label uk-text-bold" for="peferred_gender">Tutor gender reference <span class="uk-text-danger">(Requied *)</span></label>
                        {{ Form::select('peferred_gender', ['any' => 'Any', 'male' => 'Male', 'female' => 'Female'], (!empty($job->peferred_gender)) ? $job->peferred_gender : null, ['placeholder' => 'Select Tutor gender reference', 'id' => 'peferred_gender', 'class' => 'uk-select uk-form-large '.($errors->has('peferred_gender') ? 'uk-form-danger':'').'']) }}
                    </div>
                    <p class="uk-margin-remove-top uk-text-danger error peferred_gender">
                        @error('peferred_gender') {{ $message }} @enderror
                    </p>
                </div>
            </div>
            <div class="uk-width-1-2@s">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <label class="uk-form-label uk-text-bold" for="weekly">Days in a week <span class="uk-text-danger">(Requied *)</span></label>
                        {{ Form::select('weekly', [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7], (!empty($job->weekly)) ? $job->weekly : null, ['placeholder' => 'Select Days in a week', 'id' => 'weekly', 'class' => 'uk-select uk-form-large '.($errors->has('weekly') ? 'uk-form-danger':'').'']) }}
                    </div>
                    <p class="uk-margin-remove-top uk-text-danger error weekly">
                        @error('weekly') {{ $message }} @enderror
                    </p>
                </div>
            </div>
        </div>
        <div class="uk-grid-small" uk-grid>
            <div class="uk-width-1-2@s">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <label class="uk-form-label uk-text-bold" for="salary">Salary <span class="uk-text-danger">(Requied *)</span></label>
                        <input id="salary" class="uk-input uk-form-large @error('salary') uk-form-danger @enderror" type="number" name="salary" placeholder="{{ __('Salary') }}" value="{{ (!empty($job->salary)) ? $job->salary : '' }}" {{ (empty($job->salary)) ? 'disabled' : '' }}>
                        <label class="uk-text-bold"><input class="uk-checkbox salary_negotiate" name="salary_negotiate" type="checkbox" {{ (empty($job->salary)) ? 'checked' : '' }}> Check if you want to negotiate salary</label>  
                    </div>
                    <p class="uk-margin-remove-top uk-text-danger error salary">
                        @error('salary') {{ $message }} @enderror
                    </p>
                </div>
            </div>
            <div class="uk-width-1-2@s">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1 bootstrap-datepicker">
                        <label class="uk-form-label uk-text-bold" for="hire_date">When Are You Looking To Hire <span class="uk-text-danger">(Requied *)</span></label>
                        <input id="hire_date" class="uk-input uk-form-large datepick @error('hire_date') uk-form-danger @enderror" type="text" name="hire_date" placeholder="{{ __('When Are You Looking To Hire') }}" value="{{ (!empty($job->hire_date)) ? db2date($job->hire_date) : '' }}">  
                    </div>
                    <p class="uk-margin-remove-top uk-text-danger error hire_date">
                        @error('hire_date') {{ $message }} @enderror
                    </p>
                </div>
            </div>
        </div>
        <div class="uk-grid-small" uk-grid>
            <div class="uk-width-1-2@s">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <label class="uk-form-label uk-text-bold" for="no_of_students">No. of student <span class="uk-text-danger">(Requied *)</span></label>
                        {{ Form::select('no_of_students', [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10], (!empty($job->no_of_students)) ? $job->no_of_students : null, ['placeholder' => 'Select No. of student', 'id' => 'no_of_students', 'class' => 'uk-select uk-form-large '.($errors->has('no_of_students') ? 'uk-form-danger':'').'']) }}
                    </div>
                    <p class="uk-margin-remove-top uk-text-danger error no_of_students">
                        @error('no_of_students') {{ $message }} @enderror
                    </p>
                </div>
            </div>
            <div class="uk-width-1-2@s">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1 bootstrap-timepicker">
                        <label class="uk-form-label uk-text-bold" for="tutoring_time">Tutoring Time <span class="uk-text-danger">(Requied *)</span></label>
                        <input id="tutoring_time" class="uk-input uk-form-large timepicker @error('tutoring_time') uk-form-danger @enderror" type="text" name="tutoring_time" placeholder="{{ __('Tutoring Time') }}" value="{{ (!empty($job->tutoring_time)) ? $job->tutoring_time : '' }}" {{ (empty($job->tutoring_time)) ? 'disabled' : '' }}> 
                        <label class="uk-text-bold"><input class="uk-checkbox tutoring_time_negotiate" name="tutoring_time_negotiate" type="checkbox" {{ (empty($job->tutoring_time)) ? 'checked' : '' }}> Check if you want to negotiate Tutoring Time</label>
                    </div>
                    <p class="uk-margin-remove-top uk-text-danger error tutoring_time">
                        @error('tutoring_time') {{ $message }} @enderror
                    </p>
                </div>
            </div>
        </div>
        <div class="uk-margin">
            <div class="uk-inline uk-width-1-1">
                <label class="uk-form-label uk-text-bold" for="requirements">Requirements</label>
                <textarea id="requirements" class="uk-textarea @error('requirements') uk-form-danger @enderror" name="requirements" rows="5" placeholder="{{ __('Please tell us a bit more about your  requirement to help us match better') }}">{{ (!empty($job->requirements)) ? $job->requirements : '' }}</textarea>
            </div>
            <p class="uk-margin-remove-top uk-text-danger error requirements">
                @error('requirements') {{ $message }} @enderror
            </p>
        </div>
        <div class="uk-margin">
            <label class="uk-text-bold"><input class="uk-checkbox" name="is_hot_job" type="checkbox" value="1" {{ ($job->is_hot_job == 1) ? 'checked' : '' }}> Check if you want to make it hot job</label>
        </div>
        <div class="uk-margin">
            <button type="submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1">{{ __('Save Tuition Jobs') }}</button>
        </div>
    </form>
</div>


<script type="text/javascript">
$(document).ready(function(){

    $("#checkall").on('click',function(){
        if(this.checked){
            $('.select_subject_checkbox').prop('checked',true);
        }
        else
        {
            $('.select_subject_checkbox').prop('checked',false);
        }
    });
    $('.select_subject_checkbox').on('click',function(){
        if($('.select_subject_checkbox:checked').length == $('.select_subject_checkbox').length){
            $('#checkall').prop('checked',true);
        }else{
            $('#checkall').prop('checked',false);
        }
    });

    $("#updateTutionJobForm").submit(function() {
        axios.post('{{ route("jobs.update", $job->id) }}', $(this).serialize())
        .then(function (response) {
            console.log(response);
            $(".error.uk-text-danger").html("&nbsp;");
            toastr.success(response.data.success);
        })
        .catch(function (error) {
            console.log(error.response);
            $(".error.uk-text-danger").html("&nbsp;");
            $.each(error.response.data.errors, function(index, value){
                $(".error." + index + "").html(value[0]);
            });
            if (error.response.data.errors != null) {
            toastr.error(error.response.data.message);
            }
            if (error.response.data.error != null) {
            toastr.error(error.response.data.error);
            }
        });
    })

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

    $('input[name="curriculum"]').attr('disabled', 'disabled');
    $("#categories_id").change(function(){
        var categories_id = $(this).val();
        var initselcourse = '<option selected="selected" value="">Select Class/Course</option>';
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

            if ($("#categories_id option:selected").text() == 'English Medium') {
                $('#curriculums').show();
                $('input[name="curriculum"]').removeAttr('disabled', 'disabled');
            }
            else
            {
                $('#curriculums').hide();
                $('input[name="curriculum"]').attr('disabled', 'disabled');
            }
        }
    });

    $("#courses_id").change(function(){

        var courses_id = $(this).val();
        var initselsubject = '';
        $("#subjects_id").html(initselsubject);
        
        if (courses_id != "") {
            axios.get('{{ route("get_subjects") }}/'+courses_id)
            .then(function (response) {
                var opt = [];
                opt.push(initselsubject);
                $.each(response.data, function (key, value) {
                    opt.push('<label class="uk-margin-small-left"><input class="uk-checkbox select_subject_checkbox" type="checkbox" name="subjects_id[]" value="' + key + '"> ' + value + '</label>');
                });
                $("#subjects_id").html(opt);
            })
            .catch(function (error) {
                console.log(error);
            });
        }

    });
})
</script>
@endsection