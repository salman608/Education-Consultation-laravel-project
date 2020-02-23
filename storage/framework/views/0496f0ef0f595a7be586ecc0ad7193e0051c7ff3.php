<?php $__env->startSection('content'); ?>

<div class="uk-card uk-card-body uk-card-small">
    <div class="uk-card-header uk-card-primary uk-margin-small-bottom">
        <div class="uk-grid-small uk-flex-middle" uk-grid>
            <div class="uk-width-auto">
                <img class="uk-border-circle uk-box-shadow-medium" width="80" height="80" src="<?php echo e((!empty($profile->photo)) ? asset('storage/upload/'.$profile->photo.'') : asset('storage/upload/default-profile.png')); ?>">
            </div>
            <div class="uk-width-expand">
                <h3 class="uk-card-title uk-margin-remove-bottom uk-text-bold"><?php echo e($profile->relUser->name); ?> [ <?php echo e($profile->relUser->email); ?> ]</h3>
                <p class="uk-text-emphasis uk-margin-remove-top">Profile Completed: <?php echo e($percentage); ?>%</p>
            </div>
        </div>
    </div>
    <div class="uk-card-header uk-card-primary uk-text-bold">Personal Information</div>
    <div class="uk-card-body">
		<div class="uk-grid-small" uk-grid>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Tutor ID</dt>
				    <dd><?php echo e($profile->relUser->id); ?></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Registration Date Time</dt>
				    <dd><?php echo e(date('d-m-Y h:m:s a', strtotime($profile->relUser->created_at))); ?></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your E-mail</dt>
				    <dd><?php echo e($profile->relUser->email); ?></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Gender</dt>
				    <dd><?php echo e((!empty($profile->gender)) ? $profile->gender : $empty); ?></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Contact Number</dt>
				    <dd><?php echo e($profile->phone); ?></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-1@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Address</dt>
				    <dd><?php echo e((!empty($profile->address)) ? $profile->address : $empty); ?></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-1@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Birth Certificate No</dt>
				    <dd><?php echo e((!empty($profile->identity)) ? $profile->identity : $empty); ?></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Facebook ID</dt>
				    <dd><a href="<?php echo e($profile->facebook_link); ?>"><?php echo e((!empty($profile->facebook_link)) ? $profile->facebook_link : $empty); ?></a></dd>
				</dl>
		    </div>
	    </div>
	</div>
    <div class="uk-card-header uk-card-primary uk-text-bold">Parents Information</div>
    <div class="uk-card-body">
		<div class="uk-grid-small" uk-grid>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Father Name</dt>
				    <dd><?php echo e((!empty($profile->father_name)) ? $profile->father_name : $empty); ?></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Father Mobile No.</dt>
				    <dd><?php echo e((!empty($profile->father_mobile_no)) ? $profile->father_mobile_no : $empty); ?></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Mother Name</dt>
				    <dd><?php echo e((!empty($profile->mother_name)) ? $profile->mother_name : $empty); ?></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Mother Mobile No.</dt>
				    <dd><?php echo e((!empty($profile->mother_mobile_no)) ? $profile->mother_mobile_no : $empty); ?></dd>
				</dl>
		    </div>
		</div>
	</div>
    <div class="uk-card-header uk-card-primary uk-text-bold">Emergency Contact Info</div>
    <div class="uk-card-body">
		<div class="uk-grid-small" uk-grid>
		    <div class="uk-width-1-1@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Emergency Contact Name</dt>
				    <dd><?php echo e((!empty($profile->emergency_name)) ? $profile->emergency_name : $empty); ?></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-1@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Emergency Contact Address</dt>
				    <dd><?php echo e((!empty($profile->emergency_address)) ? $profile->emergency_address : $empty); ?></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Contact No.</dt>
				    <dd><?php echo e((!empty($profile->emergency_mobile_no)) ? $profile->emergency_mobile_no : $empty); ?></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Relation</dt>
				    <dd><?php echo e((!empty($profile->emergency_relation)) ? $profile->emergency_relation : $empty); ?></dd>
				</dl>
		    </div>
		</div>
	</div>
    <div class="uk-card-header uk-card-primary uk-text-bold">Tuition Related Information</div>
    <div class="uk-card-body">
		<p class="uk-text-primary uk-text-bold">Your Selected Category Info</p>
		<div class="uk-margin">
			<?php if(count($profile->relTpCategories)): ?>
				<?php
				$profile->relTpCategories->map(function ($loop) {
				?>
				<span class="uk-label uk-label-success"><?php echo e($loop->relCategory->name); ?></span>
		        <?php
		    	});
				?>
			<?php else: ?>
				<?php echo e($empty); ?>

			<?php endif; ?>
		</div>

		<p class="uk-text-primary uk-text-bold">Preferable Classes and Subjects</p>
		<div class="uk-margin">
			<?php if(count($profile_courses_subjects)): ?>
				<?php $__currentLoopData = $profile_courses_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<p><span class="uk-label uk-label-success"><?php echo e($key); ?></span> <span class="uk-label uk-label-primary"><?php echo e(implode(", ", $course)); ?></span> </p>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php else: ?>
				<?php echo e($empty); ?>

			<?php endif; ?>
		</div>
		<p class="uk-text-primary uk-text-bold">Your Selected Location Info</p>
		<div class="uk-grid-small" uk-grid>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your City</dt>
				    <dd><?php echo e((!empty($profile->relCity->name)) ? $profile->relCity->name : $empty); ?></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Location</dt>
				    <dd><?php echo e((!empty($profile->relLocation->name)) ? $profile->relLocation->name : $empty); ?></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-1@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Preferred Location</dt>
				    <dd>
				    	<?php if(count($profile->relTpPreferredLocations)): ?>
							<?php
							$profile->relTpPreferredLocations->map(function ($loop) {
							?>
							<span class="uk-label uk-label-success"><?php echo e($loop->relLocation->name); ?></span>
					        <?php
					    	});
							?>
						<?php else: ?>
							<?php echo e($empty); ?>

						<?php endif; ?>
				    </dd>
				</dl>
		    </div>
		</div>
		<p class="uk-text-primary uk-text-bold">Where Do You Want to Provide Your Service?</p>
		<div class="uk-margin">
			<?php if(count($profile->relTpProvideService)): ?>
			<?php
				$profile->relTpProvideService->map(function ($loop) {
				?>
				<span class="uk-label uk-label-success"><?php echo e($loop->name); ?></span>
		        <?php
		    	});
				?>
			<?php else: ?>
				<?php echo e($empty); ?>

			<?php endif; ?>
		</div>
		<p class="uk-text-primary uk-text-bold">Experience Info</p>
		<div class="uk-grid-small" uk-grid>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Do you have any tutoring experience?</dt>
				    <dd><?php echo e((!empty($profile->have_experience)) ? $profile->have_experience : $empty); ?></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your total experience?</dt>
				    <dd><?php echo e((!empty($profile->experience)) ? $profile->experience : $empty); ?></dd>
				</dl>
		    </div>
		</div>
		<p class="uk-text-primary uk-text-bold">Availability / Salary</p>
		<div class="uk-grid-small" uk-grid>
		    <div class="uk-width-1-1@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Available Days</dt>
				    <dd>
				    	<?php if(count($profile->relTpAvailability)): ?>
							<?php
							$profile->relTpAvailability->map(function ($loop) {
							?>
							<span class="uk-label uk-label-success"><?php echo e($loop->day); ?></span>
					        <?php
					    	});
							?>
						<?php else: ?>
							<?php echo e($empty); ?>

						<?php endif; ?>
				    </dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>You Available From</dt>
				    <dd><?php echo e((!empty($profile->from_time)) ? $profile->from_time : $empty); ?></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Available To</dt>
				    <dd><?php echo e((!empty($profile->to_time)) ? $profile->to_time : $empty); ?></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>You Expected Salary (BDT)</dt>
				    <dd><?php echo e((!empty($profile->salary)) ? $profile->salary : $empty); ?> Tk</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Tuition Style</dt>
				    <dd>
				    	<?php if(count($profile->relTpTutoringStyle)): ?>
							<?php
							$profile->relTpTutoringStyle->map(function ($loop) {
							?>
							<span class="uk-label uk-label-success"><?php echo e($loop->name); ?></span>
					        <?php
					    	});
							?>
						<?php else: ?>
							<?php echo e($empty); ?>

						<?php endif; ?>
				    </dd>
				</dl>
		    </div>
		</div>
	</div>
    <div class="uk-card-header uk-card-primary uk-text-bold">Education Information</div>
    <div class="uk-card-body">
    	<?php if(count($profile->relTpEducational)): ?>
			<?php
			$profile->relTpEducational->map(function ($loop) {
			?>
			<div class="uk-grid-small" uk-grid>
			    <div class="uk-width-1-3@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>Level Of Education</dt>
					    <dd><?php echo e($loop->level_of_education); ?></dd>
					</dl>
			    </div>
			    <div class="uk-width-1-3@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>Exam / Degree</dt>
					    <dd><?php echo e($loop->degree_title); ?></dd>
					</dl>
			    </div>
			    <div class="uk-width-1-3@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>Concentration / Major / Group</dt>
					    <dd><?php echo e($loop->group_name); ?></dd>
					</dl>
			    </div>
			    <div class="uk-width-1-1@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>Institute Name</dt>
					    <dd><?php echo e($loop->institute_name); ?></dd>
					</dl>
			    </div>
			    <div class="uk-width-1-3@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>GPA / CGPA</dt>
					    <dd><?php echo e($loop->result); ?></dd>
					</dl>
			    </div>
			    <div class="uk-width-1-3@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>Year of passing</dt>
					    <dd><?php echo e($loop->year_of_passing); ?></dd>
					</dl>
			    </div>
			    <div class="uk-width-1-3@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>Curriculum</dt>
					    <dd><?php echo e($loop->curriculum); ?></dd>
					</dl>
			    </div>
			    <div class="uk-width-1-2@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>From Date</dt>
					    <dd><?php echo e($loop->from_date); ?></dd>
					</dl>
			    </div>
			    <div class="uk-width-1-2@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>Until Date</dt>
			    		<?php if($loop->is_until): ?>
					    <dd>I'm currently studying here</dd>
			    		<?php endif; ?>
			    		<?php if($loop->is_until == false): ?>
					    <dd><?php echo e($loop->until_date); ?></dd>
			    		<?php endif; ?>
					</dl>
			    </div>
			</div>
			<hr>
	        <?php
	    	});
			?>
		<?php else: ?>
			<?php echo e($empty); ?>

		<?php endif; ?>
    </div>
    <div class="uk-card-header uk-card-primary uk-text-bold">Tutor Credentials</div>
    <div class="uk-card-body">
    	<?php if(count($profile->relTpCredential)): ?>
    	<div class="uk-grid-small" uk-grid>
    		<?php $__currentLoopData = $profile->relTpCredential; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $credential): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    		<div class="uk-width-1-4@s">
    			<h6 class="uk-margin-small-bottom"><strong><?php echo e($credential->credential_type); ?></strong></h6>
    			<img src="<?php echo e(asset('storage/upload/'.$credential->filename.'')); ?>" alt="<?php echo e($credential->credential_type); ?>">
    		</div>
    		<div id="<?php echo e($credential->filename); ?>" uk-modal>
			    <div class="uk-modal-dialog uk-modal-body">
			        <h2 class="uk-modal-title"><?php echo e($credential->credential_type); ?></h2>
			        <img src="<?php echo e(asset('storage/upload/'.$credential->filename.'')); ?>" alt="<?php echo e($credential->credential_type); ?>">
			        <p class="uk-text-right">
			            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
			        </p>
			    </div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    	</div>
    	<?php else: ?>
			<?php echo e($empty); ?>

		<?php endif; ?>
    </div>
    <div class="uk-card-footer">
    	<?php if($profile->is_premium == 0): ?>
        <a href="<?php echo e(route('tutors.premium', $profile->relUser->id)); ?>" class="uk-button uk-button-danger">Make premium</a>
        <?php endif; ?>
    	<?php if($profile->is_premium == 1): ?>
        <a href="<?php echo e(route('tutors.general', $profile->relUser->id)); ?>" class="uk-button uk-button-danger">Remove premium</a>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tutorprovide/public_html/resources/views/tutors/show.blade.php ENDPATH**/ ?>