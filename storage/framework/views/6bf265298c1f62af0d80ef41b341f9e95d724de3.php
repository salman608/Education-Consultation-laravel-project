<?php $__env->startSection('content'); ?>
<div class="uk-card uk-card-body uk-card-small">
	<div class="uk-card-body">
	    <h3 class="uk-heading-divider uk-clearfix uk-margin-small-bottom">Need a <?php echo e($job->relCategories->name); ?> - <?php echo e($job->relCourse->name); ?> Tutor</h3>
	</div>
    <div class="uk-card-header uk-card-primary uk-text-bold">
    	Subjects :
    	<?php if(!empty($job->relJbSubject)): ?>
	    	<?php $__currentLoopData = $job->relJbSubject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	    		<?php echo e($suject->relSubject->name); ?>,&nbsp;
	    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    	<?php endif; ?>
    </div>

    <div class="uk-card-header uk-card-primary uk-text-bold">Contact Info :</div>
    <div class="uk-card-body">
		<div class="uk-grid-small" uk-grid>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Name</dt>
				    <dd><?php echo e($job->relUser->name); ?></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Email</dt>
				    <dd><?php echo e($job->relUser->email); ?></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Phone</dt>
				    <dd><?php echo e($job->relGuardianProfile->phone); ?></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Address</dt>
				    <dd><?php echo e($job->relGuardianProfile->address); ?></dd>
				</dl>
		    </div>
		</div>
	</div>

    <div class="uk-card-header uk-card-primary uk-text-bold">Requirement details :</div>
    <div class="uk-card-body">
		<div class="uk-grid-small" uk-grid>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Category</dt>
				    <dd><?php echo e($job->relCategories->name); ?> <?php if(!empty($job->curriculum)): ?><strong>Curriculum : </strong> <?php echo e($job->curriculum); ?> <?php endif; ?></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Class</dt>
				    <dd><?php echo e($job->relCourse->name); ?></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Preferred gender</dt>
				    <dd class="uk-text-capitalize"><?php echo e($job->peferred_gender); ?></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Weekly</dt>
				    <dd><?php echo e($job->weekly); ?></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Salary</dt>
				    <dd><?php echo e((!empty($job->salary)) ? $job->salary.' Tk' : 'Negotiate'); ?></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Hire Date</dt>
				    <dd><?php echo e(db2date($job->hire_date)); ?></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Description</dt>
				    <dd><?php echo e($job->requirements); ?></dd>
				</dl>
		    </div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tutorprovide/public_html/resources/views/jobboard/guardian/show.blade.php ENDPATH**/ ?>