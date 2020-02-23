<?php $__env->startSection('content'); ?>
<div class="blocks login" style="max-width: 480px;">
    <h5 class="title"><?php echo e(__('Sign In')); ?></h5>
    <div class="content">
        <form class="" action="<?php echo e(route('login')); ?>" method="POST">
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
endif; ?>" id="password" name="password" placeholder="<?php echo e(__('Password')); ?>" required autocomplete="current-password">
                <p id="password_help" class="form-text text-muted"><?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo e(__('Login')); ?></button>
            <?php if(Route::has('password.request')): ?>
            <a href="<?php echo e(route('password.request')); ?>"><?php echo e(__('Forgot Your Password?')); ?></a>
            <?php endif; ?>
        </form>
    </div>
    <div class="content">
        <a class="btn btn-success register_tutor" href="<?php echo e(route('register.tutor')); ?>"><?php echo e(__('Tutor Registration')); ?></a>
        <a class="btn btn-success register_guardian" href="<?php echo e(route('register')); ?>"><?php echo e(__('Guardian Registration')); ?></a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\tutore\resources\views/auth/login.blade.php ENDPATH**/ ?>