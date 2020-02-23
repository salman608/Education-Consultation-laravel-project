<?php $__env->startSection('content'); ?>
<div class="blocks">
    <h5 class="title"><?php echo e(__('Tutor Sign Up')); ?></h5>
    <div class="content">
        <form id="tutorRegisterForm" action="javaScript:;">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="name"><?php echo e(__('Name')); ?> <span class="text-danger">(Requied *)</span></label>
                <input type="text" class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="name" name="name" value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(__('Name')); ?>">
                <p id="name_help" class="form-text text-muted error_name"><?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
            </div>
            <div class="form-group">
                <label for="email"><?php echo e(__('Email Address')); ?> <span class="text-danger">(Requied *)</span></label>
                <input type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('Email Address')); ?>">
                <p id="email_help" class="form-text text-muted error_email"><?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="phone"><?php echo e(__('Phone Number')); ?> <span class="text-danger">(Requied *)</span></label>
                    <input type="text" class="form-control <?php if ($errors->has('phone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('phone'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="phone" name="phone" value="<?php echo e(old('phone')); ?>" placeholder="<?php echo e(__('Phone Number')); ?>">
                    <p id="phone_help" class="form-text text-muted error_phone"><?php if ($errors->has('phone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('phone'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
                </div>
                <div class="form-group col-md-4">
                    <label for="parents_type"><?php echo e(__('Parents Type')); ?> <span class="text-danger">(Requied *)</span></label>
                    <?php echo e(Form::select('parents_type', ['father' => 'Father', 'mother' => 'Mother'], NULL, ['placeholder' => 'Select Parents Type', 'id' => 'parents_type', 'class' => 'form-control'])); ?>

                    <p id="parents_type_help" class="form-text text-muted error_parents_type"><?php if ($errors->has('parents_type')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('parents_type'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
                </div>
                <div class="form-group col-md-4">
                    <label for="parents_mobile_no"><?php echo e(__('Parents Phone Number')); ?> <span class="text-danger">(Requied *)</span></label>
                    <input type="text" class="form-control <?php if ($errors->has('parents_mobile_no')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('parents_mobile_no'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="parents_mobile_no" name="parents_mobile_no" value="<?php echo e(old('parents_mobile_no')); ?>" placeholder="<?php echo e(__('Parents Phone Number')); ?>">
                    <p id="parents_mobile_no_help" class="form-text text-muted error_parents_mobile_no"><?php if ($errors->has('parents_mobile_no')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('parents_mobile_no'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city_id"><?php echo e(__('City')); ?> <span class="text-danger">(Requied *)</span></label>
                    <?php echo e(Form::select('city_id', (!empty($cities)) ? $cities : [], NULL, ['placeholder' => 'Select City', 'id' => 'city_id', 'class' => 'form-control'])); ?>

                    <p id="city_id_help" class="form-text text-muted error_city_id"><?php if ($errors->has('city_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('city_id'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
                </div>
                <div class="form-group col-md-6">
                    <label for="locations_id"><?php echo e(__('Your location')); ?> <span class="text-danger">(Requied *)</span></label>
                    <?php echo e(Form::select('locations_id', [], NULL, ['placeholder' => 'Select Location', 'id' => 'locations_id', 'class' => 'form-control'])); ?>

                    <p id="locations_id_help" class="form-text text-muted error_locations_id"><?php if ($errors->has('locations_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('locations_id'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="institute_name"><?php echo e(__('Institute Name ( University/Collage ) ')); ?> <span class="text-danger">(Requied *)</span></label>
                    <input type="text" class="form-control <?php if ($errors->has('institute_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('institute_name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="institute_name" name="institute_name" value="<?php echo e(old('institute_name')); ?>" placeholder="<?php echo e(__('Institute Name')); ?>">
                    <p id="institute_name_help" class="form-text text-muted error_institute_name"><?php if ($errors->has('institute_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('institute_name'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
                </div>
                <div class="form-group col-md-3">
                    <label for="subject"><?php echo e(__('Subject')); ?> <span class="text-danger">(Requied *)</span></label>
                    <input type="text" class="form-control <?php if ($errors->has('subject')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('subject'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="subject" name="subject" value="<?php echo e(old('subject')); ?>" placeholder="<?php echo e(__('Subject')); ?>">
                    <p id="subject_help" class="form-text text-muted error_subject"><?php if ($errors->has('subject')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('subject'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
                </div>
                <div class="form-group col-md-3">
                    <label for="current_year"><?php echo e(__('Current Year')); ?> <span class="text-danger">(Requied *)</span></label>
                    <?php echo e(Form::select('current_year', ['1st Year' => '1st Year', '2nd Year' => '2nd Year', '3rd Year' => '3rd Year', 'Final Year' => 'Final Year', 'Completed' => 'Completed'], old('current_year'), ['placeholder' => 'Select Current Year', 'id' => 'current_year', 'class' => 'form-control'])); ?>

                    <p id="current_year_help" class="form-text text-muted error_current_year"><?php if ($errors->has('current_year')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('current_year'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
                </div>
            </div>
            <div class="form-group">
                <label for="facebook_link"><?php echo e(__('Facebook Profile Link/Name')); ?> </label>
                <input type="text" class="form-control <?php if ($errors->has('facebook_link')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('facebook_link'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="facebook_link" name="facebook_link" value="<?php echo e(old('facebook_link')); ?>" placeholder="<?php echo e(__('ex: https://www.facebook.com/your_profile_name')); ?>">
                <p id="facebook_link_help" class="form-text text-muted error_facebook_link"><?php if ($errors->has('facebook_link')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('facebook_link'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="password"><?php echo e(__('Password')); ?> <span class="text-danger">(Requied *)</span></label>
                    <input type="password" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="password" name="password" placeholder="<?php echo e(__('Password')); ?>">
                    <p class="text-danger">Your password must be 8 characters long</p>
                    <p id="password_help" class="form-text text-muted error_password"><?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
                </div>
                <div class="form-group col-md-6">
                    <label for="password_confirmation"><?php echo e(__('Retype Password')); ?> <span class="text-danger">(Requied *)</span></label>
                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="<?php echo e(__('Retype Password')); ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo e(__('Sign Up')); ?></button>
            <p class="mt-2">By Signing up, you agree to our <a href="<?php echo e(route('conditions')); ?>">Terms of Use and Privacy Policy</a></p>
        </form>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("#city_id").change(function(){
        var city_id = $(this).val();
        var initsellocation = '<option selected="selected" value="">Select Location</option>';
        $("#locations_id").html(initsellocation);
        
        if (city_id != "") {
            axios.get('<?php echo e(route("get_locations")); ?>/'+city_id)
            .then(function (response) {
                var opt = [];
                opt.push(initsellocation);
                $.each(response.data, function (key, value) {
                    opt.push('<option value="' + key + '">' + value + '</option>');
                });
                $("#locations_id").html(opt);
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    });
    $("#tutorRegisterForm").submit(function() {
        axios.post('<?php echo e(route("register.tutor")); ?>', $(this).serialize())
        .then(function (response) {
            console.log(response);
            $(".form-text.text-muted").html("&nbsp;");
            toastr.success(response.data.success);
            window.location.href = '<?php echo e(route("login")); ?>';
        })
        .catch(function (error) {
            console.log(error.response);
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
})
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\tutore\resources\views/auth/tutor_register.blade.php ENDPATH**/ ?>