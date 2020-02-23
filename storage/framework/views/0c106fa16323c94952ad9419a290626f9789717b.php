<?php $__env->startSection('content'); ?>
<div class="blocks">
    <h5 class="title"><?php echo e(__('Hire A Tutor')); ?></h5>
    <div class="content">
        <form id="registerForm" action="javaScript:;">
            <?php echo csrf_field(); ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city_id">Select City <span class="text-danger">(Requied *)</span></label>
                    <?php echo e(Form::select('city_id', $cities, old('city_id'), ['placeholder' => 'Select City', 'id' => 'city_id', 'class' => 'form-control '.($errors->has('city_id') ? 'is-invalid':'').''])); ?>

                    <p id="city_id_help" class="form-text text-muted error_city_id"><?php if ($errors->has('city_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('city_id'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
                </div>
                <div class="form-group col-md-6">
                    <label for="locations_id">Select Location <span class="text-danger">(Requied *)</span></label>
                    <?php echo e(Form::select('locations_id', [], old('locations_id'), ['placeholder' => 'Select Location', 'id' => 'locations_id', 'class' => 'form-control '.($errors->has('locations_id') ? 'is-invalid':'').''])); ?>

                    <p id="locations_id_help" class="form-text text-muted error_locations_id"><?php if ($errors->has('locations_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('locations_id'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="categories_id">Select Category <span class="text-danger">(Requied *)</span></label>
                    <?php echo e(Form::select('categories_id', $categories, old('categories_id'), ['placeholder' => 'Select Category', 'id' => 'categories_id', 'class' => 'form-control '.($errors->has('categories_id') ? 'is-invalid':'').''])); ?>

                    <p id="categories_id_help" class="form-text text-muted error_categories_id"><?php if ($errors->has('categories_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('categories_id'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
                </div>
                <div class="form-group col-md-6">
                    <label for="courses_id">Select Class/Course <span class="text-danger">(Requied *)</span></label>
                    <?php echo e(Form::select('courses_id', [], old('courses_id'), ['placeholder' => 'Select Class/Course', 'id' => 'courses_id', 'class' => 'form-control '.($errors->has('courses_id') ? 'is-invalid':'').''])); ?>

                    <p id="courses_id_help" class="form-text text-muted error_courses_id"><?php if ($errors->has('courses_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('courses_id'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="student_gender">Select Student Gender <span class="text-danger">(Requied *)</span></label>
                    <?php echo e(Form::select('student_gender', ['male' => 'Male', 'female' => 'Female'], old('student_gender'), ['placeholder' => 'Select Student Gender', 'id' => 'student_gender', 'class' => 'form-control '.($errors->has('student_gender') ? 'is-invalid':'').''])); ?>

                    <p id="student_gender_help" class="form-text text-muted error_student_gender"><?php if ($errors->has('student_gender')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('student_gender'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
                </div>
                <div class="form-group col-md-6">
                    <label for="institute_name">Institute Name <span class="text-danger">(Requied *)</span></label>
                    <input id="institute_name" class="form-control <?php if ($errors->has('institute_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('institute_name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="institute_name" placeholder="<?php echo e(__('Institute Name')); ?>" value="<?php echo e(old('institute_name')); ?>">
                    <p id="institute_name_help" class="form-text text-muted error_institute_name"><?php if ($errors->has('institute_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('institute_name'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Your Name ( Guardian ) <span class="text-danger">(Requied *)</span></label>
                    <input id="name" class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="name" placeholder="<?php echo e(__('Your Name')); ?>" value="<?php echo e(old('name')); ?>">
                    <p id="name_help" class="form-text text-muted error_name"><?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Parents Phone Number <span class="text-danger">(Requied *)</span></label>
                    <input id="phone" class="form-control <?php if ($errors->has('phone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('phone'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="number" name="phone" placeholder="<?php echo e(__('Parents Phone Number')); ?>" value="<?php echo e(old('phone')); ?>">
                    <p id="phone_help" class="form-text text-muted error_phone"><?php if ($errors->has('phone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('phone'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
                </div>
            </div>
            <div class="form-group">
                <label for="subjects_id">Select Subjects <span class="text-danger">(Requied *)</span></label>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="checkall">
                    <label class="custom-control-label" for="checkall">Check All</label>
                </div>
                <span id="subjects_id"></span>
                <p id="subjects_id_help" class="form-text text-muted error_subjects_id"><?php if ($errors->has('subjects_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('subjects_id'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
            </div>
            <div class="form-group" id="curriculums" style="display: none;">
                <label for="curriculum">Select Curriculum <span class="text-danger">(Requied *)</span></label>
                <div class="form-group">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="curriculum" id="Cambridge" checked value="Cambridge">
                        <label class="custom-control-label" for="Cambridge">Cambridge</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="curriculum" id="Ed-excel" value="Ed-excel">
                        <label class="custom-control-label" for="Ed-excel">Ed-excel</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="curriculum" id="IB" value="IB">
                        <label class="custom-control-label" for="IB">IB</label>
                    </div>
                </div>
                <p id="curriculum_help" class="form-text text-muted error_curriculum"><?php if ($errors->has('curriculum')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('curriculum'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="peferred_gender">Tutor gender reference <span class="text-danger">(Requied *)</span></label>
                    <?php echo e(Form::select('peferred_gender', ['any' => 'Any', 'male' => 'Male', 'female' => 'Female'], old('peferred_gender'), ['placeholder' => 'Select Tutor gender reference', 'id' => 'peferred_gender', 'class' => 'form-control '.($errors->has('peferred_gender') ? 'is-invalid':'').''])); ?>

                    <p id="peferred_gender_help" class="form-text text-muted error_peferred_gender"><?php if ($errors->has('peferred_gender')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('peferred_gender'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
                </div>
                <div class="form-group col-md-6">
                    <label for="weekly">Days in a week <span class="text-danger">(Requied *)</span></label>
                    <?php echo e(Form::select('weekly', [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7], old('weekly'), ['placeholder' => 'Select Days in a week', 'id' => 'weekly', 'class' => 'form-control '.($errors->has('weekly') ? 'is-invalid':'').''])); ?>

                    <p id="weekly_help" class="form-text text-muted error_weekly"><?php if ($errors->has('weekly')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('weekly'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="salary">Salary <span class="text-danger">(Requied *)</span></label>
                    <input id="salary" class="form-control <?php if ($errors->has('salary')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('salary'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="number" name="salary" placeholder="<?php echo e(__('Salary')); ?>" value="<?php echo e(old('salary')); ?>">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="salary_negotiate" name="salary_negotiate">
                        <label class="custom-control-label" for="salary_negotiate">Check if you want to negotiate salary</label>
                    </div>
                    <p id="salary_help" class="form-text text-muted error_salary"><?php if ($errors->has('salary')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('salary'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
                </div>
                <div class="form-group col-md-6">
                    <label for="hire_date">When Are You Looking To Hire <span class="text-danger">(Requied *)</span></label>
                    <input id="hire_date" class="form-control datepick <?php if ($errors->has('hire_date')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('hire_date'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="hire_date" placeholder="<?php echo e(__('When Are You Looking To Hire')); ?>" value="<?php echo e(old('hire_date')); ?>">
                    <p id="hire_date_help" class="form-text text-muted error_hire_date"><?php if ($errors->has('hire_date')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('hire_date'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
                </div>
            </div>
            <div class="form-group">
                <div class="uk-inline uk-width-1-1">
                    <label for="address">Address <span class="text-danger">(Requied *)</span></label>
                    <textarea id="address" class="form-control <?php if ($errors->has('address')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('address'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="address" rows="5" placeholder="<?php echo e(__('Address')); ?>"><?php echo e(old('address')); ?></textarea>
                </div>
                <p id="address_help" class="form-text text-muted error_address"><?php if ($errors->has('address')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('address'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="no_of_students">No. of student <span class="text-danger">(Requied *)</span></label>
                    <?php echo e(Form::select('no_of_students', [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10], old('no_of_students'), ['placeholder' => 'Select No. of student', 'id' => 'no_of_students', 'class' => 'form-control '.($errors->has('no_of_students') ? 'is-invalid':'').''])); ?>

                    <p id="no_of_students_help" class="form-text text-muted error_no_of_students"><?php if ($errors->has('no_of_students')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('no_of_students'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
                </div>
                <div class="form-group col-md-6 bootstrap-timepicker">
                    <label for="tutoring_time">Tutoring Time <span class="text-danger">(Requied *)</span></label>
                    <input id="tutoring_time" class="form-control timepicker <?php if ($errors->has('tutoring_time')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('tutoring_time'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" name="tutoring_time" placeholder="<?php echo e(__('Tutoring Time')); ?>" value="<?php echo e(old('tutoring_time')); ?>">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="tutoring_time_negotiate" name="tutoring_time_negotiate">
                        <label class="custom-control-label" for="tutoring_time_negotiate">Check if you want to negotiate Tutoring Time</label>
                    </div>
                    <p id="tutoring_time_help" class="form-text text-muted error_tutoring_time"><?php if ($errors->has('tutoring_time')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('tutoring_time'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
                </div>
            </div>
            <div class="form-group">
                <label for="requirements">Requirements</label>
                <textarea id="requirements" class="form-control <?php if ($errors->has('requirements')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('requirements'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="requirements" rows="5" placeholder="<?php echo e(__('Please tell us a bit more about your  requirement to help us match better')); ?>"><?php echo e(old('requirements')); ?></textarea>
                <p id="requirements_help" class="form-text text-muted error_requirements"><?php if ($errors->has('requirements')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('requirements'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
            </div>
            <div class="form-group">
                <label for="hear_about_us">How Did You Hear About Us?</label>
                <?php echo e(Form::select('hear_about_us', ['From Friends & Family' => 'From Friends & Family', 'From Facebook' => 'From Facebook', 'From Google' => 'From Google', 'From Shop' => 'From Shop', 'Others' => 'Others'], old('hear_about_us'), ['placeholder' => 'Select How Did You Hear About Us?', 'id' => 'hear_about_us', 'class' => 'form-control '.($errors->has('hear_about_us') ? 'is-invalid':'').''])); ?>

                <p id="hear_about_us_help" class="form-text text-muted error_hear_about_us"><?php if ($errors->has('hear_about_us')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('hear_about_us'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
            </div>
            <div class="form-group">
                <label for="form-stacked-text">Email Address <span class="text-danger">(Requied *)</span></label>
                <input id="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="email" name="email"" placeholder="<?php echo e(__('Email Address')); ?>" value="<?php echo e(old('email')); ?>">
                <p id="email_help" class="form-text text-muted error_email"><?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="form-stacked-text">Password <span class="text-danger">(Requied *)</span></label>
                    <input id="password" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="password" name="password" placeholder="<?php echo e(__('Password')); ?>">
                    <p class="text-danger">Your password must be 8 characters long</p>
                    <p id="password_help" class="form-text text-muted error_password"><?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?></p>
                </div>
                <div class="form-group col-md-6">
                    <label for="password-confirm">Retype Password <span class="text-danger">(Requied *)</span></label>
                    <input id="password-confirm" class="form-control" type="password" name="password_confirmation" placeholder="<?php echo e(__('Retype Password')); ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo e(__('Sign Up')); ?></button>
            <p class="mt-2">By Signing up, you agree to our <a href="<?php echo e(route('conditions')); ?>">Terms of Use and Privacy Policy</a></p>
        </form>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#salary_negotiate').click( function(){
        var is_checked = $(this).prop('checked');
        $('#salary').removeAttr('disabled', 'disabled');
        if (is_checked) {
            $('#salary').attr('disabled', 'disabled');
            $('#salary').val('');
        }
    });

    $('#tutoring_time_negotiate').click( function(){
        var is_checked = $(this).prop('checked');
        $('#tutoring_time').removeAttr('disabled', 'disabled');
        if (is_checked) {
            $('#tutoring_time').attr('disabled', 'disabled');
            $('#tutoring_time').val('');
        }
    });

    $("#checkall").on('click',function(){
        if(this.checked){
            $('.select_subject_checkbox').prop('checked',true);
        }
        else
        {
            $('.select_subject_checkbox').prop('checked',false);
        }
    });
    $('.select_subject_checkbox').on('click',function(){
        if($('.select_subject_checkbox:checked').length == $('.select_subject_checkbox').length){
            $('#checkall').prop('checked',true);
        }else{
            $('#checkall').prop('checked',false);
        }
    });

    $("#registerForm").submit(function() {
        axios.post('<?php echo e(route("register")); ?>', $(this).serialize())
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
    })
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

    $('input[name="curriculum"]').attr('disabled', 'disabled');
    $("#categories_id").change(function(){
        var categories_id = $(this).val();
        var initselcourse = '<option selected="selected" value="">Select Class/Course</option>';
        var initselsubject = '';
        $("#courses_id").html(initselcourse);
        $("#subjects_id").html(initselsubject);
        
        if (categories_id != "") {
            axios.get('<?php echo e(route("get_cources")); ?>/'+categories_id)
            .then(function (response) {
                var opt = [];
                opt.push(initselcourse);
                $.each(response.data, function (key, value) {
                    opt.push('<option value="' + key + '">' + value + '</option>');
                });
                $("#courses_id").html(opt);
            })
            .catch(function (error) {
                console.log(error);
            });

            if ($("#categories_id option:selected").text() == 'English Medium') {
                $('#curriculums').show();
                $('input[name="curriculum"]').removeAttr('disabled', 'disabled');
            }
            else
            {
                $('#curriculums').hide();
                $('input[name="curriculum"]').attr('disabled', 'disabled');
            }
        }
    });

    $("#courses_id").change(function(){
        var courses_id = $(this).val();
        var initselsubject = '';
        $("#subjects_id").html(initselsubject);
        
        if (courses_id != "") {
            axios.get('<?php echo e(route("get_subjects")); ?>/'+courses_id)
            .then(function (response) {
                var opt = [];
                opt.push(initselsubject);
                $.each(response.data, function (key, value) {
                    opt.push('<div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input select_subject_checkbox" name="subjects_id[]" id="id_' + key + '" value="' + key + '"><label class="custom-control-label" for="id_' + key + '">' + value + '</label></div>');
                });
                $("#subjects_id").html(opt);
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    });
})
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tutorprovide/public_html/resources/views/auth/register.blade.php ENDPATH**/ ?>