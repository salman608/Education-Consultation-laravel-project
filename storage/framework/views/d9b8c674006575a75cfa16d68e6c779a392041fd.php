<?php $__env->startSection('content'); ?>
<div class="blocks">
    <h5 class="title"><?php echo e(__('Forgot Password')); ?></h5>
    <div class="content">
        <?php if(session('status')): ?>
        <div class="alert alert-danger" role="alert"><?php echo e(session('status')); ?></div>
        <?php endif; ?>
        <form method="POST" action="<?php echo e(route('password.email')); ?>">
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
            <button type="submit" class="btn btn-primary"><?php echo e(__('Reset Password')); ?></button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tutorprovide/public_html/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>