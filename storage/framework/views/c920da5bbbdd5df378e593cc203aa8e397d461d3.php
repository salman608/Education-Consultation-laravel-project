<?php $__env->startSection('content'); ?>
<div class="uk-card">
	<div class="uk-card-body">
	    <h3 class="uk-heading-divider uk-clearfix">
		    Need a <?php echo e($job->relCategories->name); ?> - <?php echo e($job->relCourse->name); ?> Tutor
		    <?php if(in_array($job->is_published, ['reviewing', 'published'])): ?>
		    <a class="uk-button uk-button-primary uk-float-right" href="<?php echo e(route('jobs.edit', $job->id)); ?>"><span uk-icon="plus-pencil"></span> <strong class="button-text-hide">Edit Tuition Job</strong></a>
			<?php endif; ?>
		</h3>
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
				    <dt>Tution ID</dt>
				    <dd><?php echo e((empty($job->job_id)) ? $job->id : $job->job_id); ?></dd>
				</dl>
		    </div>
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
				    <dd><?php echo e($job->hire_date); ?></dd>
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

	<?php if(count($job->relAppliedJobs)): ?>
	<div class="uk-card-header uk-card-primary uk-text-bold">Applied Tutor's :</div>
    <div class="uk-child-width-1-2@m" uk-grid>
    <?php $__currentLoopData = $job->relAppliedJobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $applied_job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="uk-card">
	    <div class="uk-card-header uk-padding-remove-bottom">
	        <div class="uk-grid-small uk-flex-middle" uk-grid>
	            <div class="uk-width-auto">
	                <img class="uk-border-circle uk-box-shadow-medium" width="80" height="80" src="<?php echo e((!empty($applied_job->relTutorProfile->photo)) ? asset('storage/upload/'.$applied_job->relTutorProfile->photo.'') : asset('storage/upload/default-profile.png')); ?>">

	            </div>
	            <div class="uk-width-expand">
	                <h3 class="uk-card-title uk-margin-remove-bottom uk-text-bold"><?php echo e($applied_job->relTutorProfile->relUser->name); ?></h3>
	                <p class="uk-text-emphasis uk-margin-remove-top"><?php echo e((!empty($applied_job->relTutorProfile->relCity->name)) ? $applied_job->relTutorProfile->relCity->name.' ,' : ""); ?> <?php echo e((!empty($applied_job->relTutorProfile->relLocation->name)) ? $applied_job->relTutorProfile->relLocation->name : ""); ?></p>
	                <p class="uk-margin-remove-top uk-text-bold uk-text-emphasis">Profile Completed: <?php echo e(App\TutorProfile::tutorProfilePercentage( $applied_job->relTutorProfile )); ?>%</p>
	            </div>
	        </div>
	    </div>
	    <div class="uk-card-body uk-margin uk-padding-remove-top uk-padding-remove-bottom">
			<div class="uk-grid-small" uk-grid>
				<div class="">


					<p style="color:black;font-weight: bold;"> <strong>Tutor's E-mail</strong> :  <?php echo e($applied_job->relTutorProfile->relUser->email); ?></p>
					<p style="color:black;font-weight: bold;"> <strong>Tutor's Contact</strong>:   <?php echo e($applied_job->relTutorProfile->phone); ?></p>
					<p style="color:black;font-weight: bold;"> <strong>Tutor's Institute</strong>:  App\TpEducational::relTpEducational<?php echo e($applied_job->relTutorProfile->phone); ?></p>


				</div>
			    <!-- <div class="uk-width-1-2@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>Tutor's E-mail</dt>
					    <dd><?php echo e($applied_job->relTutorProfile->relUser->email); ?></dd>
					</dl>
			    </div> -->
			    <!-- <div class="uk-width-1-2@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>Tutor's Contact</dt>
					    <dd><?php echo e($applied_job->relTutorProfile->phone); ?></dd>
					</dl>
			    </div> -->
<!--
					<div class="uk-width-1-2@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>University</dt>
					    <dd></dd>
					</dl>
			    </div> -->
			</div>
	    </div>
	    <div class="uk-card-footer">
	        <a href="<?php echo e(route('tutors.show', $applied_job->user_id)); ?>" class="uk-button uk-button-primary" target="_blank">View Profile</a>
	    </div>
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
	<hr class="uk-divider-icon">
	<?php endif; ?>

	<?php echo e(Form::open(['method' => 'delete', 'route' => ['jobs.delete', $job->id], 'class' => 'uk-padding-small logout-form'])); ?>


		<?php if($job->is_published == 'reviewing'): ?>
        <button type="submit" class="uk-button uk-button-danger"><strong class="uk-margin-small-right" uk-icon="icon: trash"></strong> <span><?php echo e(__('Delete Tuition Job')); ?></span></button>
        <?php endif; ?>

        <?php if($job->is_published == 'published'): ?>
        <button type="submit" class="uk-button uk-button-primary"><strong class="uk-margin-small-right" uk-icon="icon: check"></strong> <span><?php echo e(__('Complete Tuition Job')); ?></span></button>
        <?php endif; ?>

        <?php if($job->is_published == 'reviewing'): ?>
    	<a class="uk-button uk-button-secondary uk-float-right" href="<?php echo e(route('jobs.approve', $job->id)); ?>"><span uk-icon="check"></span> <strong class="button-text-hide"><?php echo e(__('Approve Tution Job')); ?></strong></a>
    	<?php endif; ?>

    <?php echo e(Form::close()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\tutore\resources\views/jobboard/admin/show.blade.php ENDPATH**/ ?>