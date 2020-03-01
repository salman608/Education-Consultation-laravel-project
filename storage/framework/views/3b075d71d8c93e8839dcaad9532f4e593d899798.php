<?php if(!empty($jobs)): ?>

<div class="row">
  <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="col-md-6">
    <div class="tuitions uk-card-hover" id="wave-effect">
        <p class="job-id text-primary"> <span class="btn btn-purple"  style="font-size:10px;">Tution ID - <?php echo e((empty($job->job_id)) ? 'Not Available' : $job->job_id); ?></span> <span>Posted on <?php echo e(date('d M, Y', strtotime($job->created_at))); ?></span></p>
        <h5>Need a tutor for <?php echo e($job->relCourse->name); ?> student</h5>
        <!-- <div class="row">
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
        </div> -->

        <div class="">
            <div class="block"><strong class="uk-text-primary">Category :</strong> <span class="uk-text-bold"><?php echo e($job->relCategories->name); ?></span> </div>
            <?php if(!empty($job->curriculum)): ?>
            <div class=""><strong class="uk-text-primary">Curriculum :</strong><span class="uk-text-bold"><?php echo e($job->curriculum); ?></span></div>
            <?php endif; ?>
            <div class=""><strong class="uk-text-primary">Class :</strong> <span class="uk-text-bold"><?php echo e($job->relCourse->name); ?></span></div>

            <div class="uk-text-capitalize"><strong class="uk-text-primary">Student Gender :</strong><span class="uk-text-bold"> <?php echo e($job->student_gender); ?></span></div>
        </div>

        <!-- <p class="weekly"><?php echo e($job->weekly); ?> days per week</p>
        <p><strong>Salary :</strong> <?php echo e((!empty($job->salary)) ? $job->salary.' Tk' : 'Negotiate'); ?>, <strong>Tutor gender preference :</strong> <span class="badge badge-danger"><?php echo e($job->peferred_gender); ?></span> <strong>No. of Students :</strong> <?php echo e($job->no_of_students); ?></p> -->

        <div class="uk-text-bold"> <strong class="uk-text-primary">Days :</strong><?php echo e($job->weekly); ?> days per week</div>
        <div class="uk-text-capitalize">
       <strong class="uk-text-primary">Salary :</strong> <span class="uk-text-bold"><?php echo e((!empty($job->salary)) ? $job->salary.' Tk' : 'Negotiate'); ?>,</span>

        </div>

        <div class=""><strong class="uk-text-primary">Tutor gender preference :</strong><span class="btn btn-danger uk-label" style="padding:0 5px;margin-left:5px;"><?php echo e($job->peferred_gender); ?></span></div>

        <div class="uk-text-bold"><strong class="uk-text-primary">No. of Students :</strong>    <?php echo e($job->no_of_students); ?></div>
        <!-- <p>
            <strong>Subjects :</strong>
            <?php if(!empty($job->relJbSubject)): ?>
                <?php $__currentLoopData = $job->relJbSubject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="badge badge-success"><?php echo e($suject->relSubject->name); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </p>
        <p><strong>Tutoring Time :</strong> <?php echo e((!empty($job->tutoring_time)) ? $job->tutoring_time : 'Negotiate'); ?></p>
        <p><strong>Location:</strong>  <?php echo e($job->relCity->name); ?>, <?php echo e($job->relLocation->name); ?></p> -->

        <div class="">
            <strong class="uk-text-primary">Subjects :</strong>
            <?php if(!empty($job->relJbSubject)): ?>
                <?php $__currentLoopData = $job->relJbSubject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class=" uk-text-bold"><?php echo e($suject->relSubject->name); ?></span>,&nbsp;
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <div class=""><strong class="uk-text-primary">Tutoring Time :</strong> <span class="uk-text-bold"> <?php echo e((!empty($job->tutoring_time)) ? $job->tutoring_time : 'Negotiate'); ?></span></div>

        <div class=""><strong class="uk-text-primary">Location:</strong><span class="uk-text-bold"><?php echo e($job->relCity->name); ?>, <?php echo e($job->relLocation->name); ?></span></div>
        <form id="applyForm" action="<?php echo e(route('job.apply', $job->id)); ?>">
            <button type="button" class="btn btn-primary btn-sm" name="apply">Apply Now</button>
        </form>
        <p style="font-weight:bold;"><em>Other Requirements - <?php echo e((!empty($job->requirements)) ? $job->requirements : 'Interested tutors are requested to apply.'); ?></em></p>
    </div>
  </div>

  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\tutore\resources\views/component/public_tuitions.blade.php ENDPATH**/ ?>