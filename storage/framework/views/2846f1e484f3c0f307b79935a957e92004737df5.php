<?php $__env->startSection('content'); ?>
<div class="blocks">
    <h5 class="title"><?php echo e(__('Reset Password')); ?></h5>
    <div class="content">
        <form method="POST" action="<?php echo e(route('password.update')); ?>">
            <input type="hidden" name="token" value="<?php echo e($token); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="email"><?php echo e(__('E-Mail Address')); ?> <span class="text-danger">(Requied *)</span></label>
                <input type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('E-Mail Address')); ?>" required autocomplete="email" autofocus>
                <p id="email_help" class="form-text text-muted"><?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
            </div>

            <div class="form-group">
                <label for="password"><?php echo e(__('Password')); ?> <span class="text-danger">(Requied *)</span></label>
                <input type="password" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="password" name="password" placeholder="<?php echo e(__('Password')); ?>" autocomplete="new-password" autofocus>
                <p class="text-danger">Your password must be 8 characters long</p>
                <p id="password_help" class="form-text text-muted error_password"><?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
            </div>

            <div class="form-group">
                <label for="password_confirmation"><?php echo e(__('Retype Password')); ?> <span class="text-danger">(Requied *)</span></label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="<?php echo e(__('Retype Password')); ?>" autocomplete="new-password">
            </div>
            <button type="submit" class="btn btn-primary"><?php echo e(__('Reset Password')); ?></button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tutorprovide/public_html/resources/views/auth/passwords/reset.blade.php ENDPATH**/ ?>