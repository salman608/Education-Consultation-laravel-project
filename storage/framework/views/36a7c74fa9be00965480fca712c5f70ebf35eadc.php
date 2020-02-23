<?php $__env->startSection('content'); ?>
<div class="uk-card uk-card-body">
    <h3 class="uk-heading-divider uk-clearfix">Profile</h3>
	<dl class="uk-description-list uk-description-list-divider">
	    <dt>Full name</dt>
	    <dd><?php echo e(auth()->user()->name); ?></dd>
	</dl>
	<dl class="uk-description-list uk-description-list-divider">
	    <dt>E-mail ID</dt>
	    <dd><?php echo e(auth()->user()->email); ?></dd>
	</dl>
	<dl class="uk-description-list uk-description-list-divider">
	    <dt>Mobile No.</dt>
	    <dd><?php echo e(auth()->user()->relGuardianProfile->phone); ?></dd>
	</dl>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tutorprovide/public_html/resources/views/profile/guardian/show.blade.php ENDPATH**/ ?>