<?php $__env->startSection('content'); ?>
<div class="blocks">
    <h5 class="title"><?php echo e(__('Contact Us')); ?></h5>
    <div class="content">
        <form id="tutorRegisterForm" action="<?php echo e(route('contact.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="name"><?php echo e(__('Name')); ?></label>
                <input type="text" class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="name" name="name" value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(__('Name')); ?>" required autocomplete="name" autofocus>
                <small id="name_help" class="form-text text-muted"><?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></small>
            </div>
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

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="you_are">Select You Are</label>
                    <?php echo e(Form::select('you_are', ['Student' => 'Student', 'Parent' => 'Parent', 'Tutor' => 'Tutor'], old('you_are'), ['placeholder' => 'Select You Are', 'id' => 'you_are', 'class' => 'form-control '.($errors->has('you_are') ? 'is-invalid':'').''])); ?>

                    <small id="you_are_help" class="form-text text-muted error_you_are"><?php if ($errors->has('you_are')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('you_are'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></small>
                </div>
                <div class="form-group col-md-6">
                    <label for="subject">Select Subject</label>
                    <?php echo e(Form::select('subject', ['I want to give a feedback' => 'I want to give a feedback', 'I have an issue' => 'I have an issue', 'I have an inquiry' => 'I have an inquiry', 'Others' => 'Others'], old('subject'), ['placeholder' => 'Select Subject', 'id' => 'subject', 'class' => 'form-control '.($errors->has('courses_id') ? 'is-invalid':'').''])); ?>

                    <small id="subject_help" class="form-text text-muted error_subject"><?php if ($errors->has('subject')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('subject'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></small>
                </div>
            </div>
            <div class="form-group">
                <div class="uk-inline uk-width-1-1">
                    <label for="message">Your Message Here...</label>
                    <textarea id="message" class="form-control <?php if ($errors->has('message')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('message'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="message" rows="5" placeholder="<?php echo e(__('Your Message Here...')); ?>"><?php echo e(old('message')); ?></textarea>
                </div>
                <small id="message_help" class="form-text text-muted error_message"><?php if ($errors->has('message')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('message'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></small>
            </div>
            <div class="uk-margin">
                <button type="submit" class="btn btn-success"><?php echo e(__('Send')); ?></button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tutorprovide/public_html/resources/views/contact.blade.php ENDPATH**/ ?>