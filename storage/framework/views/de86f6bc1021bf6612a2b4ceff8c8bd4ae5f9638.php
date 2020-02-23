<?php if(!empty($jobs)): ?>
<?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="tuitions">
    <p class="job-id text-primary">Tution ID - <?php echo e((empty($job->job_id)) ? 'Not Available' : $job->job_id); ?> <span>Posted on <?php echo e(date('d M, Y', strtotime($job->created_at))); ?></span></p>
    <h5>Need a tutor for <?php echo e($job->relCourse->name); ?> student</h5>
    <div class="row">
        <div class="col-md-4">
            <p><strong>Category :</strong>  <?php echo e($job->relCategories->name); ?></p>
        </div>
        <?php if(!empty($job->curriculum)): ?>
        <div class="col-md-4">
            <p><strong>Curriculum :</strong> <?php echo e($job->curriculum); ?></p>
        </div>
        <?php endif; ?>
        <div class="col-md-4">
            <p><strong>Class :</strong> <?php echo e($job->relCourse->name); ?></p>
        </div>
        <div class="col-md-4">
            <p><strong>Student Gender :</strong> <?php echo e($job->student_gender); ?></p>
        </div>
    </div>
    <p class="weekly"><?php echo e($job->weekly); ?> days per week</p>
    <p><strong>Salary :</strong> <?php echo e((!empty($job->salary)) ? $job->salary.' Tk' : 'Negotiate'); ?>, <strong>Tutor gender preference :</strong> <span class="badge badge-danger"><?php echo e($job->peferred_gender); ?></span> <strong>No. of Students :</strong> <?php echo e($job->no_of_students); ?></p>
    <p>
        <strong>Subjects :</strong>
        <?php if(!empty($job->relJbSubject)): ?>
            <?php $__currentLoopData = $job->relJbSubject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="badge badge-success"><?php echo e($suject->relSubject->name); ?></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </p>
    <p><strong>Tutoring Time :</strong> <?php echo e((!empty($job->tutoring_time)) ? $job->tutoring_time : 'Negotiate'); ?></p>
    <p><strong>Location:</strong>  <?php echo e($job->relCity->name); ?>, <?php echo e($job->relLocation->name); ?></p>
    <form id="applyForm" action="<?php echo e(route('job.apply', $job->id)); ?>">
        <button type="button" class="btn btn-primary btn-sm" name="apply">Apply Now</button>
    </form>
    <p><em>Other Requirements - <?php echo e((!empty($job->requirements)) ? $job->requirements : 'Interested tutors are requested to apply.'); ?></em></p>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH /home/tutorprovide/public_html/resources/views/component/public_tuitions.blade.php ENDPATH**/ ?>