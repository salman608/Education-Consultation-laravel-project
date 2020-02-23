<?php $__env->startSection('content'); ?>
<div class="blocks">
    <h5 class="title"><?php echo e(__('Verify Your Email Address')); ?></h5>
    <div class="content">
        <?php if(session('resent')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo e(__('A fresh verification link has been sent to your email address.')); ?>

        </div>
        <?php endif; ?>

        <p><?php echo e(__('Before proceeding, please check your email for a verification link.')); ?></p>
        <p><?php echo e(__('If you did not receive the email')); ?>, <a href="<?php echo e(route('verification.resend')); ?>"><?php echo e(__('click here to request another')); ?></a>.
        </p>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tutorprovide/public_html/resources/views/auth/verify.blade.php ENDPATH**/ ?>