<?php $__env->startSection('content'); ?>
<div class="uk-card uk-card-body">
    <h3 class="uk-heading-divider uk-clearfix">Update Subjects</h3>
    <div class="uk-margin uk-width-large uk-margin-auto">
		<form method="POST" action="<?php echo e(route('subjects.update', $subject->id)); ?>">
	        <?php echo csrf_field(); ?>
			<div class="uk-margin">
				<label class="uk-form-label" for="form-stacked-text">Select category</label>
	            <?php echo e(Form::select('categories_id', $categories, $subject->relCourse->relCategories->id, ['id' => 'categories_id', 'placeholder' => 'Select category', 'class' => 'uk-select  uk-form-large'])); ?>

	            <p class="uk-margin-remove-top uk-text-small uk-text-danger">
	                <?php if ($errors->has('categories_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('categories_id'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
	            </p>
	        </div>
			<div class="uk-margin">
				<label class="uk-form-label" for="form-stacked-text">Select course</label>
	            <?php echo e(Form::select('courses_id', $courses, $subject->courses_id, ['id' => 'courses_id', 'placeholder' => 'Select course', 'class' => 'uk-select  uk-form-large'])); ?>

	            <p class="uk-margin-remove-top uk-text-small uk-text-danger">
	                <?php if ($errors->has('courses_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('courses_id'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
	            </p>
	        </div>
	        <div class="uk-margin">
	            <div class="uk-inline uk-width-1-1">
					<label class="uk-form-label" for="form-stacked-text">Subject Name</label>
	            	<?php echo e(Form::text('name', $subject->name, ['required', 'autofocus', 'class' => 'uk-input uk-form-large '.($errors->has('name') ? 'uk-form-danger':'').'', 'placeholder' => 'Course Name'])); ?>

	            </div>
	            <p class="uk-margin-remove-top uk-text-small uk-text-danger">
	                <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
	            </p>
	        </div>
	        <div class="uk-margin">
	            <button type="submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1"><?php echo e(__('Update Subjects')); ?></button>
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
	        axios.get('<?php echo e(env("APP_URL")); ?>/get_cources/'+categories_id)
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
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tutorprovide/public_html/resources/views/subjects/edit.blade.php ENDPATH**/ ?>