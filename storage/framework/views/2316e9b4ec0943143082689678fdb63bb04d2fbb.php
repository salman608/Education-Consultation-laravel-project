<?php $__env->startSection('content'); ?>
<div class="uk-card uk-card-body">
    <h3 class="uk-heading-divider uk-clearfix">Edit Need a <?php echo e((!empty($job->relCategories->name)) ? $job->relCategories->name : $empty); ?> - <?php echo e((!empty($job->relCourse->name)) ? $job->relCourse->name : $empty); ?> Tutor</h3>
    <form id="updateTutionJobForm" action="javaScript:;">
        <?php echo csrf_field(); ?>
        <div class="uk-margin">
            <div class="uk-inline uk-width-1-1">
                <label class="uk-form-label uk-text-bold" for="job_id">Tution ID</label>
                <input id="job_id" class="uk-input uk-form-large <?php if ($errors->has('job_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('job_id'); ?> uk-form-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="job_id" placeholder="<?php echo e(__('Tution ID')); ?>" value="<?php echo e((!empty($job->job_id)) ? $job->job_id : ''); ?>">  
            </div>
            <p class="uk-margin-remove-top uk-text-danger error job_id">
                <?php if ($errors->has('job_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('job_id'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            </p>
        </div>
        <div class="uk-grid-small" uk-grid>
            <div class="uk-width-1-2@s">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <label class="uk-form-label uk-text-bold" for="city_id">Select City <span class="uk-text-danger">(Requied *)</span></label>
                        <?php echo e(Form::select('city_id', $cities, (!empty($job->city_id)) ? $job->city_id : null, ['placeholder' => 'Select City', 'id' => 'city_id', 'class' => 'uk-select uk-form-large '.($errors->has('city_id') ? 'uk-form-danger':'').''])); ?>

                    </div>
                    <p class="uk-margin-remove-top uk-text-danger error city_id">
                        <?php if ($errors->has('city_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('city_id'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </p>
                </div>
            </div>
            <div class="uk-width-1-2@s">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <label class="uk-form-label uk-text-bold" for="locations_id">Select Location <span class="uk-text-danger">(Requied *)</span></label>
                        <?php echo e(Form::select('locations_id', $selected_locations, (!empty($job->locations_id)) ? $job->locations_id : null, ['placeholder' => 'Select Location', 'id' => 'locations_id', 'class' => 'uk-select uk-form-large '.($errors->has('locations_id') ? 'uk-form-danger':'').''])); ?>

                    </div>
                    <p class="uk-margin-remove-top uk-text-danger error locations_id">
                        <?php if ($errors->has('locations_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('locations_id'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="uk-grid-small" uk-grid>
            <div class="uk-width-1-2@s">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <label class="uk-form-label uk-text-bold" for="categories_id">Select Category <span class="uk-text-danger">(Requied *)</span></label>
                        <?php echo e(Form::select('categories_id', $categories, (!empty($job->categories_id)) ? $job->categories_id : null, ['placeholder' => 'Select Category', 'id' => 'categories_id', 'class' => 'uk-select uk-form-large '.($errors->has('categories_id') ? 'uk-form-danger':'').''])); ?>

                    </div>
                    <p class="uk-margin-remove-top uk-text-danger error categories_id">
                        <?php if ($errors->has('categories_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('categories_id'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </p>
                </div>
            </div>
            <div class="uk-width-1-2@s">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <label class="uk-form-label uk-text-bold" for="courses_id">Select Class/Course <span class="uk-text-danger">(Requied *)</span></label>
                        <?php echo e(Form::select('courses_id', $selected_courses, (!empty($job->courses_id)) ? $job->courses_id : null, ['placeholder' => 'Select Class/Course', 'id' => 'courses_id', 'class' => 'uk-select uk-form-large '.($errors->has('courses_id') ? 'uk-form-danger':'').''])); ?>

                    </div>
                    <p class="uk-margin-remove-top uk-text-danger error courses_id">
                        <?php if ($errors->has('courses_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('courses_id'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="uk-grid-small" uk-grid>
            <div class="uk-width-1-2@s">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <label class="uk-form-label uk-text-bold" for="student_gender">Select Student Gender <span class="uk-text-danger">(Requied *)</span></label>
                        <?php echo e(Form::select('student_gender', ['male' => 'Male', 'female' => 'Female'], (!empty($job->student_gender)) ? $job->student_gender : null, ['placeholder' => 'Select Student Gender', 'id' => 'student_gender', 'class' => 'uk-select uk-form-large '.($errors->has('student_gender') ? 'uk-form-danger':'').''])); ?>

                    </div>
                    <p class="uk-margin-remove-top uk-text-danger error student_gender">
                        <?php if ($errors->has('student_gender')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('student_gender'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </p>
                </div>
            </div>
            <div class="uk-width-1-2@s">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <label class="uk-form-label uk-text-bold" for="institute_name">Institute Name <span class="uk-text-danger">(Requied *)</span></label>
                        <input id="institute_name" class="uk-input uk-form-large <?php if ($errors->has('institute_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('institute_name'); ?> uk-form-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="institute_name" placeholder="<?php echo e(__('Institute Name')); ?>" value="<?php echo e((!empty($job->institute_name)) ? $job->institute_name : ''); ?>">  
                    </div>
                    <p class="uk-margin-remove-top uk-text-danger error institute_name">
                        <?php if ($errors->has('institute_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('institute_name'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label uk-text-bold" for="subjects_id">Select Subjects <span class="uk-text-danger">(Requied *)</span></label>
            <div class="uk-margin">
                <label class="uk-text-bold"><input class="uk-checkbox" type="checkbox" id="checkall" <?php echo e((count($selected_subject) == count($job->relJbSubject)) ? 'checked' : ''); ?>> Check All</label>
                <span id="subjects_id">
                	<?php if(!empty($selected_subject)): ?>
				    	<?php $__currentLoopData = $selected_subject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				    		<label class="uk-margin-small-left"><input class="uk-checkbox select_subject_checkbox" type="checkbox" name="subjects_id[]" value="<?php echo e($suject->id); ?>" <?php echo e((in_array($suject->id, $subject_id)) ? 'checked' : ''); ?> > <?php echo e($suject->name); ?></label>
				    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                	<?php endif; ?>
                </span>
            </div>
            <p class="uk-margin-remove-top uk-text-danger error subjects_id">
                <?php if ($errors->has('subjects_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('subjects_id'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            </p>
        </div>
        <div class="uk-margin" id="curriculums" style="<?php echo e((empty($job->curriculum)) ? 'display: none;' : ''); ?>">
            <label class="uk-form-label uk-text-bold" for="curriculum">Select Curriculum <span class="uk-text-danger">(Requied *)</span></label>
            <div class="uk-margin">
                <label class="uk-text-bold"><input class="uk-radio" type="radio" name="curriculum" value="Cambridge" <?php echo e(($job->curriculum == 'Cambridge') ? 'checked' : ''); ?>> Cambridge</label>
                <label class="uk-text-bold"><input class="uk-radio" type="radio" name="curriculum" value="Ed-excel" <?php echo e(($job->curriculum == 'Ed-excel') ? 'checked' : ''); ?>> Ed-excel</label>
                <label class="uk-text-bold"><input class="uk-radio" type="radio" name="curriculum" value="IB" <?php echo e(($job->curriculum == 'IB') ? 'checked' : ''); ?>> IB</label>
            </div>
            <p class="uk-margin-remove-top uk-text-danger error curriculum">
                <?php if ($errors->has('curriculum')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('curriculum'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            </p>
        </div>
        <div class="uk-grid-small" uk-grid>
            <div class="uk-width-1-2@s">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <label class="uk-form-label uk-text-bold" for="peferred_gender">Tutor gender reference <span class="uk-text-danger">(Requied *)</span></label>
                        <?php echo e(Form::select('peferred_gender', ['any' => 'Any', 'male' => 'Male', 'female' => 'Female'], (!empty($job->peferred_gender)) ? $job->peferred_gender : null, ['placeholder' => 'Select Tutor gender reference', 'id' => 'peferred_gender', 'class' => 'uk-select uk-form-large '.($errors->has('peferred_gender') ? 'uk-form-danger':'').''])); ?>

                    </div>
                    <p class="uk-margin-remove-top uk-text-danger error peferred_gender">
                        <?php if ($errors->has('peferred_gender')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('peferred_gender'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </p>
                </div>
            </div>
            <div class="uk-width-1-2@s">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <label class="uk-form-label uk-text-bold" for="weekly">Days in a week <span class="uk-text-danger">(Requied *)</span></label>
                        <?php echo e(Form::select('weekly', [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7], (!empty($job->weekly)) ? $job->weekly : null, ['placeholder' => 'Select Days in a week', 'id' => 'weekly', 'class' => 'uk-select uk-form-large '.($errors->has('weekly') ? 'uk-form-danger':'').''])); ?>

                    </div>
                    <p class="uk-margin-remove-top uk-text-danger error weekly">
                        <?php if ($errors->has('weekly')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('weekly'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="uk-grid-small" uk-grid>
            <div class="uk-width-1-2@s">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <label class="uk-form-label uk-text-bold" for="salary">Salary <span class="uk-text-danger">(Requied *)</span></label>
                        <input id="salary" class="uk-input uk-form-large <?php if ($errors->has('salary')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('salary'); ?> uk-form-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="number" name="salary" placeholder="<?php echo e(__('Salary')); ?>" value="<?php echo e((!empty($job->salary)) ? $job->salary : ''); ?>" <?php echo e((empty($job->salary)) ? 'disabled' : ''); ?>>
                        <label class="uk-text-bold"><input class="uk-checkbox salary_negotiate" name="salary_negotiate" type="checkbox" <?php echo e((empty($job->salary)) ? 'checked' : ''); ?>> Check if you want to negotiate salary</label>  
                    </div>
                    <p class="uk-margin-remove-top uk-text-danger error salary">
                        <?php if ($errors->has('salary')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('salary'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </p>
                </div>
            </div>
            <div class="uk-width-1-2@s">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1 bootstrap-datepicker">
                        <label class="uk-form-label uk-text-bold" for="hire_date">When Are You Looking To Hire <span class="uk-text-danger">(Requied *)</span></label>
                        <input id="hire_date" class="uk-input uk-form-large datepick <?php if ($errors->has('hire_date')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('hire_date'); ?> uk-form-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="hire_date" placeholder="<?php echo e(__('When Are You Looking To Hire')); ?>" value="<?php echo e((!empty($job->hire_date)) ? db2date($job->hire_date) : ''); ?>">  
                    </div>
                    <p class="uk-margin-remove-top uk-text-danger error hire_date">
                        <?php if ($errors->has('hire_date')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('hire_date'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="uk-grid-small" uk-grid>
            <div class="uk-width-1-2@s">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <label class="uk-form-label uk-text-bold" for="no_of_students">No. of student <span class="uk-text-danger">(Requied *)</span></label>
                        <?php echo e(Form::select('no_of_students', [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10], (!empty($job->no_of_students)) ? $job->no_of_students : null, ['placeholder' => 'Select No. of student', 'id' => 'no_of_students', 'class' => 'uk-select uk-form-large '.($errors->has('no_of_students') ? 'uk-form-danger':'').''])); ?>

                    </div>
                    <p class="uk-margin-remove-top uk-text-danger error no_of_students">
                        <?php if ($errors->has('no_of_students')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('no_of_students'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </p>
                </div>
            </div>
            <div class="uk-width-1-2@s">
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1 bootstrap-timepicker">
                        <label class="uk-form-label uk-text-bold" for="tutoring_time">Tutoring Time <span class="uk-text-danger">(Requied *)</span></label>
                        <input id="tutoring_time" class="uk-input uk-form-large timepicker <?php if ($errors->has('tutoring_time')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('tutoring_time'); ?> uk-form-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="tutoring_time" placeholder="<?php echo e(__('Tutoring Time')); ?>" value="<?php echo e((!empty($job->tutoring_time)) ? $job->tutoring_time : ''); ?>" <?php echo e((empty($job->tutoring_time)) ? 'disabled' : ''); ?>> 
                        <label class="uk-text-bold"><input class="uk-checkbox tutoring_time_negotiate" name="tutoring_time_negotiate" type="checkbox" <?php echo e((empty($job->tutoring_time)) ? 'checked' : ''); ?>> Check if you want to negotiate Tutoring Time</label>
                    </div>
                    <p class="uk-margin-remove-top uk-text-danger error tutoring_time">
                        <?php if ($errors->has('tutoring_time')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('tutoring_time'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="uk-margin">
            <div class="uk-inline uk-width-1-1">
                <label class="uk-form-label uk-text-bold" for="requirements">Requirements</label>
                <textarea id="requirements" class="uk-textarea <?php if ($errors->has('requirements')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('requirements'); ?> uk-form-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="requirements" rows="5" placeholder="<?php echo e(__('Please tell us a bit more about your  requirement to help us match better')); ?>"><?php echo e((!empty($job->requirements)) ? $job->requirements : ''); ?></textarea>
            </div>
            <p class="uk-margin-remove-top uk-text-danger error requirements">
                <?php if ($errors->has('requirements')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('requirements'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            </p>
        </div>
        <div class="uk-margin">
            <label class="uk-text-bold"><input class="uk-checkbox" name="is_hot_job" type="checkbox" value="1" <?php echo e(($job->is_hot_job == 1) ? 'checked' : ''); ?>> Check if you want to make it hot job</label>
        </div>
        <div class="uk-margin">
            <button type="submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1"><?php echo e(__('Save Tuition Jobs')); ?></button>
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
        axios.post('<?php echo e(route("jobs.update", $job->id)); ?>', $(this).serialize())
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
            axios.get('<?php echo e(route("get_locations")); ?>/'+city_id)
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
            axios.get('<?php echo e(route("get_cources")); ?>/'+categories_id)
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
            axios.get('<?php echo e(route("get_subjects")); ?>/'+courses_id)
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tutorprovide/public_html/resources/views/jobboard/admin/edit.blade.php ENDPATH**/ ?>