<?php $__env->startSection('content'); ?>
<div class="uk-card uk-card-body">
    <h3 class="uk-heading-divider uk-clearfix">Tuition Jobs</h3>
	<table class="uk-table uk-table-middle uk-table-divider uk-table-small">
	    <thead>
	        <tr>
	            <th class="uk-width-small">Tution ID</th>
	            <th class="uk-table-expand">Tution Name</th>
	            <th class="uk-width-small">Status</th>
	            <th class="uk-table-expand uk-width-small">Applied Tutor's</th>
	            <th class="uk-width-small uk-text-right">Action</th>
	        </tr>
	    </thead>
	    <tbody>
	    	<?php if(!empty($jobs)): ?>
	    	<?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        <tr>
	            <td class="uk-text-emphasis"><?php echo e((empty($job->job_id)) ? $job->id : $job->job_id); ?></td>
	            <td class="uk-text-emphasis">
	                <p class="uk-margin-remove uk-text-bold">Need a tutor for <?php echo e($job->relCourse->name); ?></p>
	                <p class="uk-margin-remove uk-text-bold">Guardian Phone : <?php echo e($job->relGuardianProfile->phone); ?></p>
	                <p class="uk-margin-remove uk-text-bold">Location : <?php echo e($job->relCity->name); ?>, <?php echo e($job->relLocation->name); ?></p>
	                <p class="uk-margin-remove uk-text-bold"><small>Posted On : <?php echo e($job->created_at); ?></small></p>
	           </td>
	            <td class="uk-text-emphasis uk-text-capitalize"><?php echo e($job->is_published); ?></td>
	            <td class="uk-text-emphasis uk-text-capitalize uk-text-center"><span class="uk-badge"><?php echo e(count($job->relAppliedJobs)); ?></span></td>
	            <td class="uk-text-right">
					<a href="<?php echo e(route('jobs.show', $job->id)); ?>" class="uk-icon-link uk-margin-small-right" uk-icon="info"></a>
					<?php if(in_array($job->is_published, ['reviewing', 'published'])): ?>
					<a href="<?php echo e(route('jobs.edit', $job->id)); ?>" class="uk-icon-link uk-margin-small-right" uk-icon="pencil"></a>
					<?php endif; ?>
	            </td>
	        </tr>
	        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	        <?php endif; ?>
	    </tbody>
	</table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\tutore\resources\views/jobboard/admin/index.blade.php ENDPATH**/ ?>