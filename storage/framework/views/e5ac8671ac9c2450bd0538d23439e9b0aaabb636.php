<?php $__env->startSection('content'); ?>
<div class="fetured-images owl-carousel owl-theme">
    <div class="item">
        <img src="<?php echo e(asset('assets/images/graduate-being-proud-with-copy-space_23-2148232785.jpg')); ?>" alt="">
    </div>
    <div class="item">
        <img src="<?php echo e(asset('assets/images/happy-mother-met-her-daughter-after-classes-outdoors-primary-school_106029-654.jpg')); ?>" alt="">
    </div>
    <div class="item">
        <img src="<?php echo e(asset('assets/images/portrait-student-child-girl-studying-library_1150-5912.jpg')); ?>" alt="">
    </div>
    <div class="item">
        <img src="<?php echo e(asset('assets/images/teacher-correcting-mistakes-pupil-s-notebook_1098-2798.jpg')); ?>" alt="">
    </div>
    <div class="item">
        <img src="<?php echo e(asset('assets/images/kids-school_1098-321.jpg')); ?>" alt="">
    </div>
</div>
<div class="blocks categories_hide_lg">
    <img src="<?php echo e(asset('assets/images/banner.png')); ?>" alt="Advertiesment">
</div>
<?php if(count($premium_tutors) > 0): ?>
<div class="blocks">
    <h5 class="title">Premium tutors</h5>
    <div class="premium-tutors owl-carousel owl-theme">
        <?php $__currentLoopData = $premium_tutors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $premium_tutor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="item">
            <div class="row">
                <?php $__currentLoopData = $premium_tutor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tutor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6">
                    <a href="" class="media">
                        <img src="<?php echo e((!empty($tutor->photo)) ? asset('storage/upload/'.$tutor->photo.'') : asset('storage/upload/default-profile.png')); ?>" class="mr-2 rounded-circle" alt="..." style="width: 70px;">
                        <div class="media-body">
                            <h5 class="mt-0"><?php echo e($tutor->relUser->name); ?></h5>
                            <p class="text-secondary"><?php echo (count($tutor->relTpEducational) > 0) ? $tutor->relTpEducational[0]->institute_name : '&nbsp;'; ?></p>
                            <p class="text-success"><?php echo (count($tutor->relTpEducational) > 0) ? $tutor->relTpEducational[0]->group_name : '&nbsp;'; ?></p>
                            <p class="text-info"><?php echo (!empty($tutor->address)) ? $tutor->address : '&nbsp;'; ?></p>
                        </div>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php endif; ?>
<?php if(count($hot_jobs) > 0): ?>
<div class="blocks">
    <h5 class="title">Hot Jobs</h5>
    <div class="hot-jobs owl-carousel owl-theme">
        <?php $__currentLoopData = $hot_jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hot_job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="item">
            <div class="row">
                <?php $__currentLoopData = $hot_job; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6">
                    <div class="jobs" title="Tution ID - <?php echo e((empty($job->job_id)) ? $job->id : $job->job_id); ?>">
                        <p>Tution ID - <?php echo e((empty($job->job_id)) ? $job->id : $job->job_id); ?></p>
                        <p><a href="">Need a tutor for <?php echo e($job->relCourse->name); ?> student</a></p>
                        <p><small><em>Posted on <?php echo e(date('d M, Y', strtotime($job->created_at))); ?></em></small></p>
                        <p><strong>Salary :</strong> <?php echo e((!empty($job->salary)) ? $job->salary.' Tk' : 'Negotiate'); ?></p>
                        <p><?php echo e($job->relCategories->name); ?>, <?php echo e($job->relCourse->name); ?></p>
                        <p><?php echo e($job->relCity->name); ?>, <?php echo e($job->relLocation->name); ?></p>
                        <form id="applyForm" action="<?php echo e(route('job.apply', $job->id)); ?>" class="mt-2 text-right">
                            <button type="button" class="btn btn-primary btn-sm" name="apply">Apply Now</button>
                        </form>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<form id="ajaxLoginModal" class="modal" tabindex="-1" role="dialog" action="javaScript:;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('Sign In')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="email"><?php echo e(__('E-Mail Address')); ?></label>
                    <input type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('E-Mail Address')); ?>" required autocomplete="email" autofocus>
                    <small id="email_help" class="form-text text-muted"><?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></small>
                </div>
                <div class="form-group">
                    <label for="password"><?php echo e(__('Password')); ?></label>
                    <input type="password" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="password" name="password" placeholder="<?php echo e(__('Password')); ?>" required autocomplete="current-password">
                    <small id="password_help" class="form-text text-muted"><?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></small>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-success btn-sm mr-auto" href="<?php echo e(route('register.tutor')); ?>"><?php echo e(__('Tutor Registration')); ?></a>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm"><?php echo e(__('Login')); ?></button>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">
$(document).ready(function(){
    $(document).on('click', 'button[name="apply"]', function(){
        axios.get($(this).parent('form').attr('action'))
        .then(function (response) {
            toastr.success(response.data.success);
        })
        .catch(function (error) {
            console.log(error.response)
            if (error.response.status == '400') {
                if (error.response.data.error != null) {
                toastr.error(error.response.data.error);
                }
            }
            else
            {
                $('#ajaxLoginModal').modal('show')
            }
        });
    });

    $("#ajaxLoginModal").submit(function() {
        axios.post('<?php echo e(route("login_tutor")); ?>', $(this).serialize())
        .then(function (response) {
            console.log(response)
            $(".form-text.text-muted").html("&nbsp;");
            toastr.success(response.data.success);
            $('#ajaxLoginModal').modal('hide')
        })
        .catch(function (error) {
            console.log(error.response)
            $(".form-text.text-muted").html("&nbsp;");
            $.each(error.response.data.errors, function(index, value){
                $(".error_" + index + "").html(value[0]);
            });
            if (error.response.data.errors != null) {
            toastr.error(error.response.data.message);
            }
            if (error.response.data.error != null) {
            toastr.error(error.response.data.error);
            }
        });
    });
});
</script>
<?php endif; ?>
<div class="blocks">
    <h5 class="title">Rating</h5>
    <div class="row">
        <div class="col-md-3">
            <div class="rating">
                3410<strong>Total Applied</strong>
            </div>
        </div>
        <div class="col-md-3">
            <div class="rating">
                49<strong>Live Tuition Jobs</strong>
            </div>
        </div>
        <div class="col-md-3">
            <div class="rating">
                3133<strong>Happy Students</strong>
            </div>
        </div>
        <div class="col-md-3">
            <div class="rating">
                4.5 / 5<strong>Average Tutor Rating</strong>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tutorprovide/public_html/resources/views/index.blade.php ENDPATH**/ ?>