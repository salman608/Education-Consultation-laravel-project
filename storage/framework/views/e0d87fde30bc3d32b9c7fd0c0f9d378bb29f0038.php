<?php if(!empty($jobs)): ?>
<?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="jobboard uk-card uk-card-default uk-card-body uk-card-small uk-text-small uk-margin-medium-bottom">
    <div class="uk-clearfix">
        <span class="uk-text-bold">Tution ID - <?php echo e((empty($job->job_id)) ? 'Not Available' : $job->job_id); ?></span>
        <span class="uk-float-right uk-text-bold">Posted on <?php echo e(date('d M, Y', strtotime($job->created_at))); ?></span>
    </div>
    <h3 class="uk-card-title uk-text-bold">Need a tutor for <?php echo e($job->relCourse->name); ?> student</h3>
    <div class="uk-column-1-4@m">
        <div class=""><strong class="uk-text-primary">Category :</strong> <?php echo e($job->relCategories->name); ?></div>
        <?php if(!empty($job->curriculum)): ?>
        <div class=""><strong class="uk-text-primary">Curriculum :</strong> <?php echo e($job->curriculum); ?></div>
        <?php endif; ?>
        <div class=""><strong class="uk-text-primary">Class :</strong> <?php echo e($job->relCourse->name); ?></div>
        <div class="uk-text-capitalize"><strong class="uk-text-primary">Student Gender :</strong> <?php echo e($job->student_gender); ?></div>
    </div>
    <div class="uk-text-bold"><?php echo e($job->weekly); ?> days per week</div>
    <div class="uk-text-capitalize"><strong>Salary :</strong> <?php echo e((!empty($job->salary)) ? $job->salary.' Tk' : 'Negotiate'); ?>, <strong>Tutor gender preference :</strong> <span class="uk-label uk-label-danger"><?php echo e($job->peferred_gender); ?></span> <strong>No. of Students :</strong> <?php echo e($job->no_of_students); ?></div>
    <div class="">
        <strong>Subjects :</strong>
        <?php if(!empty($job->relJbSubject)): ?>
            <?php $__currentLoopData = $job->relJbSubject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="uk-text-primary uk-text-bold"><?php echo e($suject->relSubject->name); ?></span>,&nbsp;
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
    <div class=""><strong>Tutoring Time :</strong> <?php echo e((!empty($job->tutoring_time)) ? $job->tutoring_time : 'Negotiate'); ?></div>
    <div class=""><strong>Location:</strong>  <?php echo e($job->relCity->name); ?>, <?php echo e($job->relLocation->name); ?></div>
    <div class="uk-padding-small uk-padding-remove-horizontal uk-text-right">
        <form id="applyForm" action="<?php echo e(route('job.apply', $job->id)); ?>">
        <button type="button" class="uk-button uk-button-primary" name="apply">Apply Now</button>
        </form>
    </div>
    <div class="uk-text-meta">Other Requirements - <?php echo e((!empty($job->requirements)) ? $job->requirements : 'Interested tutors are requested to apply.'); ?></div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH D:\xampp\htdocs\tutore\resources\views/component/private_tuitions.blade.php ENDPATH**/ ?>