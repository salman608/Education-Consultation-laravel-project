<?php $__env->startSection('content'); ?>
<div class="uk-card">
    <div class="uk-card-body">
        <div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <h3 class="uk-card-title"><?php echo e($reviewing); ?></h3>
                    <p>Number of reviewing tutoring jobs</p>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <h3 class="uk-card-title"><?php echo e($published); ?></h3>
                    <p>Number of published tutoring jobs</p>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <h3 class="uk-card-title"><?php echo e($completed); ?></h3>
                    <p>Number of completed tutoring jobs</p>
                </div>
            </div>
        </div>
    </div>
    <?php if(!empty($weekly_registration)): ?>
    <div class="uk-card-body">
        <h3 class="uk-card-title uk-margin-bottom">Last Week Tutor Registration Report</h3>
        <div class="uk-grid-divider uk-child-width-expand@m" uk-grid>
            <div class="uk-text-center">
                <p class="uk-text-bold">Saturday</p>
                <p class="uk-text-bold"><?php echo e((array_key_exists('Saturday', $weekly_registration)) ? $weekly_registration['Saturday'] : '0'); ?></p>
            </div>
            <div class="uk-text-center">
                <p class="uk-text-bold">Sunday</p>
                <p class="uk-text-bold"><?php echo e((array_key_exists('Sunday', $weekly_registration)) ? $weekly_registration['Sunday'] : '0'); ?></p>
            </div>
            <div class="uk-text-center">
                <p class="uk-text-bold">Monday</p>
                <p class="uk-text-bold"><?php echo e((array_key_exists('Monday', $weekly_registration)) ? $weekly_registration['Monday'] : '0'); ?></p>
            </div>
            <div class="uk-text-center">
                <p class="uk-text-bold">Tuesday</p>
                <p class="uk-text-bold"><?php echo e((array_key_exists('Tuesday', $weekly_registration)) ? $weekly_registration['Tuesday'] : '0'); ?></p>
            </div>
            <div class="uk-text-center">
                <p class="uk-text-bold">Wednesday</p>
                <p class="uk-text-bold"><?php echo e((array_key_exists('Wednesday', $weekly_registration)) ? $weekly_registration['Wednesday'] : '0'); ?></p>
            </div>
            <div class="uk-text-center">
                <p class="uk-text-bold">Thursday</p>
                <p class="uk-text-bold"><?php echo e((array_key_exists('Thursday', $weekly_registration)) ? $weekly_registration['Thursday'] : '0'); ?></p>
            </div>
            <div class="uk-text-center">
                <p class="uk-text-bold">Friday</p>
                <p class="uk-text-bold"><?php echo e((array_key_exists('Friday', $weekly_registration)) ? $weekly_registration['Friday'] : '0'); ?></p>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tutorprovide/public_html/resources/views/dashboard/administrator.blade.php ENDPATH**/ ?>