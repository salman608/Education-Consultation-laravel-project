<?php if(!empty($jobs)): ?>


<div class="row">

<?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-md-6">
<div class="jobboard uk-card uk-card-default uk-card-body uk-card-small uk-text-small uk-margin-medium-bottom uk-card-hover" >
    <div class="uk-clearfix">
        <span class="uk-text-bold btn btn-purple"> Tution ID - <?php echo e((empty($job->job_id)) ? 'Not Available' : $job->job_id); ?></span>
        <span class="uk-float-right uk-text-bold">Posted on <?php echo e(date('d M, Y', strtotime($job->created_at))); ?></span>
    </div>
    <h3 class="uk-card-title uk-text-bold">Need a tutor for <?php echo e($job->relCourse->name); ?></h3>
    <div class="">
        <div class="block"><strong class="uk-text-primary">Category :</strong> <span class="uk-text-bold"><?php echo e($job->relCategories->name); ?></span> </div>
        <?php if(!empty($job->curriculum)): ?>
        <div class=""><strong class="uk-text-primary">Curriculum :</strong><span class="uk-text-bold"><?php echo e($job->curriculum); ?></span></div>
        <?php endif; ?>
        <div class=""><strong class="uk-text-primary">Class :</strong> <span class="uk-text-bold"><?php echo e($job->relCourse->name); ?></span></div>

        <div class="uk-text-capitalize"><strong class="uk-text-primary">Student Gender :</strong><span class="uk-text-bold"> <?php echo e($job->student_gender); ?></span></div>
    </div>

    <!-- <span class="uk-text-bold"></span> -->
    <!-- <div class="uk-column-1-4@m">
      <h5><strong class="uk-text-primary">Category :</strong> <?php echo e($job->relCategories->name); ?></h5>
        <h5><strong class="uk-text-primary">Category :</strong> <?php echo e($job->relCategories->name); ?></h5>
        <div class="block"><strong class="uk-text-primary">Category :</strong> <?php echo e($job->relCategories->name); ?></div>
        <?php if(!empty($job->curriculum)): ?>
        <div class=""><strong class="uk-text-primary">Curriculum :</strong> <?php echo e($job->curriculum); ?></div>
        <?php endif; ?>
        <div class=""><strong class="uk-text-primary">Class :</strong> <?php echo e($job->relCourse->name); ?></div>
        <div class="uk-text-capitalize"><strong class="uk-text-primary">Student Gender :</strong> <?php echo e($job->student_gender); ?></div>
    </div> -->
    <div class="uk-text-bold"> <strong class="uk-text-primary">Days :</strong><?php echo e($job->weekly); ?> days per week</div>
    <div class="uk-text-capitalize">
   <strong class="uk-text-primary">Salary :</strong> <span class="uk-text-bold"><?php echo e((!empty($job->salary)) ? $job->salary.' Tk' : 'Negotiate'); ?>,</span>

    </div>

    <div class=""><strong class="uk-text-primary">Tutor gender preference :</strong><span class="uk-label uk-label-danger" style="padding:0 5px;margin-left:5px;"><?php echo e($job->peferred_gender); ?></span></div>

    <div class="uk-text-bold"><strong class="uk-text-primary">No. of Students :</strong>    <?php echo e($job->no_of_students); ?></div>


    <div class="" style="height:40px;">
        <strong class="uk-text-primary">Subjects :</strong>
        <?php if(!empty($job->relJbSubject)): ?>
            <?php $__currentLoopData = $job->relJbSubject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class=" uk-text-bold"><?php echo e($suject->relSubject->name); ?></span>,&nbsp;
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
    <div class=""><strong class="uk-text-primary">Tutoring Time :</strong> <span class="uk-text-bold"> <?php echo e((!empty($job->tutoring_time)) ? $job->tutoring_time : 'Negotiate'); ?></span></div>

    <div class=""><strong class="uk-text-primary">Location:</strong><span class="uk-text-bold"><?php echo e($job->relCity->name); ?>, <?php echo e($job->relLocation->name); ?></span></div>
    <div class="uk-padding-small uk-padding-remove-horizontal uk-text-right">
        <form id="applyForm" action="<?php echo e(route('job.apply', $job->id)); ?>">
        <button type="button" class="uk-button uk-button-primary" name="apply">Apply Now</button>
        </form>
    </div>
    <div class="uk-text-meta uk-text-bold text-dark" style="height:40px;">Other Requirements - <?php echo e((!empty($job->requirements)) ? $job->requirements : 'Interested tutors are requested to apply.'); ?></div>
</div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


<!-- <div class="row">
  <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="col-md-6">
        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                <span class="uk-text-bold">Tution ID - <?php echo e((empty($job->job_id)) ? 'Not Available' : $job->job_id); ?></span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
  </div>

  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div> -->


<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\tutore\resources\views/component/private_tuitions.blade.php ENDPATH**/ ?>