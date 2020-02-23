<?php $__env->startSection('content'); ?>
<div class="uk-card uk-card-body">
    <h3 class="uk-heading-divider uk-clearfix">
	    Tuition Jobs
	    <a class="uk-button uk-button-primary uk-float-right" href="<?php echo e(route('jobs.create')); ?>"><span uk-icon="plus-circle"></span> <strong class="button-text-hide">Post Another Tuition Jobs</strong></a>
	</h3>
	<table class="uk-table uk-table-middle uk-table-divider">
	    <thead>
	        <tr>
	            <th class="uk-width-small">SL</th>
	            <th class="uk-table-expand">Job Name</th>
	            <th class="uk-table-expand uk-width-small">Posted On</th>
	            <th class="uk-table-expand">Status</th>
	            <th class="uk-table-expand uk-text-right">Action</th>
	        </tr>
	    </thead>
	    <tbody>
	    	<?php if(!empty($jobs)): ?>
	    	<?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        <tr>
	            <td class="uk-text-emphasis"><?php echo e(($key + 1)); ?></td>
	            <td class="uk-text-emphasis">Need a tutor for <?php echo e($job->relCourse->name); ?></td>
	            <td class="uk-text-emphasis uk-text-truncate"><?php echo e($job->created_at); ?></td>
	            <td class="uk-text-emphasis uk-text-capitalize"><?php echo e($job->is_published); ?></td>
	            <td class="uk-text-right">
					<a href="<?php echo e(route('jobs.show', $job->id)); ?>" class="uk-icon-link uk-margin-small-right" uk-icon="info"></a>
	            </td>
	        </tr>
	        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	        <?php endif; ?>
	    </tbody>
	</table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tutorprovide/public_html/resources/views/jobboard/guardian/index.blade.php ENDPATH**/ ?>