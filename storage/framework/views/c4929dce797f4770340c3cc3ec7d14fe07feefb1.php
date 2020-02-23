<?php $__env->startSection('content'); ?>
<div class="uk-card uk-card-body">
    <h3 class="uk-card-title">Tutor's</h3>
	<form id="tuitionFindtionForm" action="javaScript:;">
		<?php echo csrf_field(); ?>
		<div class="uk-grid-small" uk-grid>
			<div class="uk-width-1-3@s uk-margin uk-margin-small-bottom">
				<label class="uk-form-label" for="tutor_id">Tutor Id</label>
	            <?php echo e(Form::text('tutor_id', null, ['id' => 'tutor_id', 'class' => 'uk-input', 'placeholder' => 'Tutor Id'])); ?>

	            <p class="uk-margin-remove-top uk-text-small uk-text-danger error tutor_id">
	                <?php if ($errors->has('tutor_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('tutor_id'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
	            </p>
	        </div>
	        <div class="uk-width-1-3@s uk-margin uk-margin-small-top uk-margin-small-bottom">
	        	<label class="uk-form-label" for="tutor_name">Tutor Name</label>
	        	<?php echo e(Form::text('tutor_name', null, ['id' => 'tutor_name', 'class' => 'uk-input', 'placeholder' => 'Tutor Name'])); ?>

	            <p class="uk-margin-remove-top uk-text-small uk-text-danger error tutor_name">
	                <?php if ($errors->has('tutor_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('tutor_name'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
	            </p>
	        </div>
			<div class="uk-width-1-3@s uk-margin uk-margin-small-top uk-margin-small-bottom">
				<label class="uk-form-label" for="registration_date">Registration Date</label>
	            <?php echo e(Form::text('registration_date', null, ['id' => 'registration_date', 'class' => 'uk-input datepick', 'placeholder' => 'Registration Date'])); ?>

	            <p class="uk-margin-remove-top uk-text-small uk-text-danger error registration_date">
	                <?php if ($errors->has('registration_date')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('registration_date'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
	            </p>
	        </div>
	        <div class="uk-width-1-1@s uk-margin uk-margin-small-top uk-margin-small-bottom">
	        	<label class="uk-form-label" for="institute_name">Institute Name.</label>
	        	<?php echo e(Form::text('institute_name', null, ['id' => 'institute_name', 'class' => 'uk-input', 'placeholder' => 'Institute Name'])); ?>

	            <p class="uk-margin-remove-top uk-text-small uk-text-danger error institute_name">
	                <?php if ($errors->has('institute_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('institute_name'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
	            </p>
	        </div>
			<div class="uk-width-1-3@s uk-margin uk-margin-small-top uk-margin-small-bottom">
				<label class="uk-form-label" for="categories_id">Select Category</label>
	            <?php echo e(Form::select('categories_id', (!empty($categories)) ? $categories : [], null, ['placeholder' => 'Select Category', 'id' => 'categories_id', 'class' => 'uk-select'])); ?>

	            <p class="uk-margin-remove-top uk-text-small uk-text-danger error categories_id">
	                <?php if ($errors->has('categories_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('categories_id'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
	            </p>
	        </div>
	        <div class="uk-width-1-3@s uk-margin uk-margin-small-top uk-margin-small-bottom">
	        	<label class="uk-form-label" for="courses_id">Class / Course</label>
	        	<?php echo e(Form::select('courses_id', (!empty($selected_courses)) ? $selected_courses : [], null, ['placeholder' => 'Select Class / Course', 'id' => 'courses_id', 'class' => 'uk-select'])); ?>

	            <p class="uk-margin-remove-top uk-text-small uk-text-danger error courses_id">
	                <?php if ($errors->has('courses_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('courses_id'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
	            </p>
	        </div>
			<div class="uk-width-1-3@s uk-margin uk-margin-small-top uk-margin-small-bottom">
				<label class="uk-form-label" for="subjects_id">Select Subjects</label>
	            <?php echo e(Form::select('subjects_id', (!empty($selected_subject)) ? $selected_subject : [], null, ['placeholder' => 'Select Subjects', 'id' => 'subjects_id', 'class' => 'uk-select'])); ?>

	            <p class="uk-margin-remove-top uk-text-small uk-text-danger error subjects_id">
	                <?php if ($errors->has('subjects_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('subjects_id'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
	            </p>
	        </div>
		    <div class="uk-width-1-3@s uk-margin uk-margin-small-top uk-margin-small-bottom">
		    	<label class="uk-form-label" for="city_id">City</label>
	            <?php echo e(Form::select('city_id', (!empty($cities)) ? $cities : [], null, ['placeholder' => 'Select City', 'id' => 'city_id', 'class' => 'uk-select'])); ?>

	            <p class="uk-margin-remove-top uk-text-small uk-text-danger error city_id">
	                <?php if ($errors->has('city_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('city_id'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
	            </p>
		    </div>
		    <div class="uk-width-1-3@s uk-margin uk-margin-small-top uk-margin-small-bottom">
		    	<label class="uk-form-label" for="locations_id">Your location</label>
	            <?php echo e(Form::select('locations_id', (!empty($selected_locations)) ? $selected_locations : [], null, ['placeholder' => 'Select Location', 'id' => 'locations_id', 'class' => 'uk-select'])); ?>

	            <p class="uk-margin-remove-top uk-text-small uk-text-danger error locations_id">
	                <?php if ($errors->has('locations_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('locations_id'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
	            </p>
		    </div>
		    <div class="uk-width-1-3@s">
			    <legend class="uk-legend uk-text-small uk-text-bold">Gender</legend>
		        <div class="uk-margin">
		            <label><?php echo e(Form::radio('gender', 'Any', true, ['class' => 'uk-radio'])); ?> Any</label>
		            <label><?php echo e(Form::radio('gender', 'Male', false, ['class' => 'uk-radio'])); ?> Male</label>
		            <label><?php echo e(Form::radio('gender', 'Female', false, ['class' => 'uk-radio'])); ?> Female</label>
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

    $("#categories_id").change(function(){
        var categories_id = $(this).val();
        var initselcourse = '<option selected="selected" value="">Select Class / Course</option>';
        var initselsubject = '<option selected="selected" value="">Select Subjects</option>';
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
        }
    });

    $("#courses_id").change(function(){
        var courses_id = $(this).val();
        var initselsubject = '<option selected="selected" value="">Select Subjects</option>';
        $("#subjects_id").html(initselsubject);
        
        if (courses_id != "") {
            axios.get('<?php echo e(route("get_subjects")); ?>/'+courses_id)
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
        axios.post('<?php echo e(route("tutors.find_tutors")); ?>', $(this).serialize())
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\tutore\resources\views/tutors/index.blade.php ENDPATH**/ ?>