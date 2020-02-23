<?php if(count($tutors)): ?>
<p class="uk-text-bold"><strong><em>Total Tutors : <?php echo e($counter); ?></em></strong></p>
<table class="uk-table uk-table-middle uk-table-divider">
    <thead>
        <tr>
            <th class="uk-table-shrink">ID</th>
            <th class="uk-table-shrink">Photo</th>
            <th class="uk-table-expand">Name</th>
            <th>Percentage</th>
            <th>E-mail</th>
            <th>Location</th>
            <th>Registration</th>
            <th class="uk-text-right">Action</th>
        </tr>
    </thead>
    <tbody>
	<?php $__currentLoopData = $tutors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tutor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($tutor->relUser->id); ?></td>
        <td>
        	<img class="uk-preserve-width uk-border-circle uk-box-shadow-small" src="<?php echo e((!empty($tutor->photo)) ? asset('storage/upload/'.$tutor->photo.'') : asset('storage/upload/default-profile.png')); ?>" width="40" alt="">		            	
        </td>
        <td>
        	<p class="uk-text-emphasis uk-text-bold"><?php echo e($tutor->relUser->name); ?></p>
        	<p class="uk-text-meta uk-margin-remove-top"><?php echo e($tutor->phone); ?></p>
        </td>
        <td class="uk-text-truncate uk-text-emphasis"><?php echo e(App\TutorProfile::tutorProfilePercentage( $tutor )); ?>%</td>
        <td class="uk-text-truncate uk-text-emphasis"><?php echo e($tutor->relUser->email); ?></td>
        <td class="uk-text-truncate uk-text-emphasis"><?php echo e((!empty($tutor->relCity->name)) ? $tutor->relCity->name.' ,' : ""); ?> <?php echo e((!empty($tutor->relLocation->name)) ? $tutor->relLocation->name : ""); ?></td>
        <td class="uk-text-truncate uk-text-emphasis"><?php echo e(date('d-m-Y h:m:s a', strtotime($tutor->relUser->created_at))); ?></td>
        <td class="uk-text-right">
        	<a href="<?php echo e(route('tutors.show', $tutor->user_id)); ?>" class="uk-icon-link uk-margin-small-right" uk-icon="info"></a>
        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php else: ?>
<p class="uk-text-center">
    <strong>No data found !</strong>
</p>
<?php endif; ?><?php /**PATH /home/tutorprovide/public_html/resources/views/component/find_tutors.blade.php ENDPATH**/ ?>