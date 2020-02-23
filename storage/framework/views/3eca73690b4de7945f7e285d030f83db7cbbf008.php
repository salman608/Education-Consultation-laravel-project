<?php $__env->startSection('content'); ?>
<div class="uk-card uk-card-small">
	<div class="uk-card-body">
        <div class="uk-child-width-1-2@m uk-grid-small uk-grid-match" uk-grid>
            <div>
                <div class="uk-card uk-card-primary uk-card-body">
                    <h3 class="uk-card-title"><?php echo e($total_applied_job); ?></h3>
                    <p class="uk-text-bold uk-text-emphasis">Number of applied jobs</p>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-primary uk-card-body">
                    <h3 class="uk-card-title"><?php echo e($total_completed_job); ?></h3>
                    <p class="uk-text-bold uk-text-emphasis">Approved tuition jobs</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tutorprovide/public_html/resources/views/profile/tutor/status.blade.php ENDPATH**/ ?>