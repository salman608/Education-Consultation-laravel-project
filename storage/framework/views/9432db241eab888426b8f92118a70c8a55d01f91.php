<?php $__env->startSection('content'); ?>
<div class="uk-card uk-card-body uk-card-small">
    <h3 class="uk-heading-divider">Password Change</h3>
    <div class="uk-margin uk-width-large uk-margin-auto">
        <form method="POST" action="<?php echo e(route('password.change')); ?>">
            <?php echo csrf_field(); ?>
            <div class="uk-margin">
                <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input id="current_password" class="uk-input uk-form-large <?php if ($errors->has('current_password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('current_password'); ?> uk-form-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="password" name="current_password" placeholder="<?php echo e(__('Current Password')); ?>" required autocomplete="new-password" autofocus>  
                </div>
	            <p class="uk-margin-remove-top uk-text-small uk-text-danger">
	                <?php if ($errors->has('current_password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('current_password'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
	            </p>
            </div>
            <div class="uk-margin">
                <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input id="password" class="uk-input uk-form-large <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> uk-form-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="password" name="password" placeholder="<?php echo e(__('New Password')); ?>" required autocomplete="new-password" autofocus>  
                </div>
	            <p class="uk-margin-remove-top uk-text-small uk-text-danger">
	                <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
	            </p>
            </div>
            <div class="uk-margin">
                <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input id="password-confirm" class="uk-input uk-form-large" type="password" name="password_confirmation" placeholder="<?php echo e(__('Retype Password')); ?>" required autocomplete="new-password">  
                </div>
                <p class="uk-margin-remove-top uk-text-small uk-text-danger">
                    <?php if ($errors->has('password_confirmation')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password_confirmation'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                </p>
            </div>
            <div class="uk-margin">
                <button type="submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1"><?php echo e(__('Update Password')); ?></button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tutorprovide/public_html/resources/views/settings/change_password.blade.php ENDPATH**/ ?>