<?php $__env->startSection('content'); ?>
<div class="uk-card uk-card-body">
    <h3 class="uk-heading-divider uk-clearfix">Update Locations</h3>
    <div class="uk-margin uk-width-large uk-margin-auto">
		<form method="POST" action="<?php echo e(route('locations.update', $location->id)); ?>">
	        <?php echo csrf_field(); ?>
			<div class="uk-margin">
				<label class="uk-form-label" for="form-stacked-text">Select city</label>
	            <?php echo e(Form::select('city_id', $cities, $location->city_id, ['placeholder' => 'Select city', 'class' => 'uk-select  uk-form-large'])); ?>

	            <p class="uk-margin-remove-top uk-text-small uk-text-danger">
	                <?php if ($errors->has('city_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('city_id'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
	            </p>
	        </div>
	        <div class="uk-margin">
	            <div class="uk-inline uk-width-1-1">
					<label class="uk-form-label" for="form-stacked-text">Location Name</label>
	            	<?php echo e(Form::text('name', $location->name, ['required', 'autofocus', 'class' => 'uk-input uk-form-large '.($errors->has('name') ? 'uk-form-danger':'').'', 'placeholder' => 'Course Name'])); ?>

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
	            <button type="submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1"><?php echo e(__('Update Locations')); ?></button>
	        </div>
	    </form>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tutorprovide/public_html/resources/views/locations/edit.blade.php ENDPATH**/ ?>