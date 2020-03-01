<?php $__env->startSection('content'); ?>
<div class="uk-card uk-card-body">
    <h3 class="uk-heading-divider uk-clearfix">
	    Cities
	    <a class="uk-button uk-button-primary uk-float-right" href="<?php echo e(route('cities.create')); ?>"><span uk-icon="plus-circle"></span> <strong class="button-text-hide">Create Cities</strong></a>
	</h3>
	<table class="uk-table uk-table-middle uk-table-divider">
	    <thead>
	        <tr>
	            <th class="uk-table-expand">City Name</th>
	            <th class="uk-text-right">Action</th>
	        </tr>
	    </thead>
	    <tbody>
	    	<?php if(!empty($cities)): ?>
	    	<?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        <tr>
	            <td class="uk-text-emphasis"><?php echo e($city->name); ?></td>
	            <td class="uk-text-right">
					<a href="<?php echo e(route('cities.edit', $city->id)); ?>" class="uk-icon-link uk-margin-small-right" uk-icon="file-edit"></a>
	            </td>
	        </tr>
	        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	        <?php endif; ?>
	    </tbody>
	</table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\tutore\resources\views/cities/index.blade.php ENDPATH**/ ?>