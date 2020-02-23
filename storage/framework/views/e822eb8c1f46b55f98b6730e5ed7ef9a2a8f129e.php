<?php $__env->startSection('content'); ?>
<div class="uk-card uk-card-body uk-card-small">
	<div class="uk-card-header uk-card-primary">
		<?php echo e(auth()->user()->relTutorsProfile->gender); ?>

		<form id="jobSearchForm" class="jobsearch" action="javaScript:;">
			<?php echo csrf_field(); ?>
			<div class="uk-grid-small" uk-grid>
			    <div class="uk-width-1-4@s">
			    	<?php echo e(Form::select('city_id', $cities, null, ['placeholder' => 'Select City', 'id' => 'city_id', 'class' => 'uk-select'])); ?>

			    </div>
			    <div class="uk-width-1-4@s">
			    	<?php echo e(Form::select('locations_id[]', [], null, ['id' => 'locations_id', 'class' => 'uk-select', 'multiple' => 'multiple'])); ?>

			    </div>
			    <div class="uk-width-1-4@s">
			    	<?php echo e(Form::select('categories_id[]', $categories, null, ['id' => 'categories_id', 'class' => 'uk-select', 'multiple' => 'multiple'])); ?>

			    </div>
			    <div class="uk-width-1-4@s">
			    	<?php echo e(Form::select('courses_id', [], null, ['id' => 'courses_id', 'class' => 'uk-select', 'multiple' => 'multiple'])); ?>

			    </div>
			    <div class="uk-width-1-4@s" style="display: none;">
			    	<?php echo e(Form::select('gender[]', ['Male' => 'Male', 'Female' => 'Female', 'Any' => 'Any'], ['Any', auth()->user()->relTutorsProfile->gender], ['id' => 'gender', 'class' => 'uk-select', 'multiple' => 'multiple'])); ?>

			    </div>
			</div>
		</form>
	</div>
	<div class="uk-margin-small-top" id="available-tuitions">
    </div>
</div>
<script type="text/javascript">
var serialize = null;
function getJobBoard( serialize )
{
    axios.post('<?php echo e(route("private.get_jobs")); ?>', serialize)
    .then(function (response) {
        console.log(response);
        $('#available-tuitions').html(response.data);
    })
    .catch(function (error) {
        console.log(error);
    });
}
$(document).ready(function(){
	var g = $('#jobSearchForm').serialize();
    getJobBoard( g );
	$('#locations_id').select2({
		maximumSelectionLength: 5,
		placeholder: "Select Location"
	});
	$("#city_id").change(function(){
        var city_id = $(this).val();
        var initsellocation = '<option value="">Select Location</option>';
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
		var g = $('#jobSearchForm').serialize();
	    getJobBoard( g );
    });
	$('#categories_id').select2({
		maximumSelectionLength: 5,
		placeholder: "Select categories",
	});
	$('#courses_id').select2({
		placeholder: "Select class / course(s)"
	});
	$('#gender').select2({
		placeholder: "Select gender",
	});

	$("#categories_id").change(function(){
        var categories_id = $(this).val();
        $('#courses_id').select2({
			placeholder: "Select class / course(s)"
		}).empty().trigger('change');
        if (categories_id != "") {
			axios.get('<?php echo e(route("get_cources_with_group")); ?>/'+categories_id)
	        .then(function (response) {
	            $('#courses_id').select2({
					data: response.data,
					placeholder: "Select class / course(s)"
				});
	        })
	        .catch(function (error) {
	            console.log(error);
	        });
    	}
		var g = $('#jobSearchForm').serialize();
	    getJobBoard( g );
	});
});

$(document).on('change', '#gender', function(){
    var g = $('#jobSearchForm').serialize();
    getJobBoard( g );
});

$(document).on('change', '#locations_id', function(){
    var g = $('#jobSearchForm').serialize();
    getJobBoard( g );
});

$(document).on('change', '#courses_id', function(){
    var g = $('#jobSearchForm').serialize();
    getJobBoard( g );
});

$(document).on('click', 'button[name="apply"]', function(){
    axios.get($(this).parent('form').attr('action'))
    .then(function (response) {
        console.log(response);
        toastr.success(response.data.success);
    })
    .catch(function (error) {
        console.log(error.response);
        toastr.error(error.response.data.error);
    });
});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tutorprovide/public_html/resources/views/dashboard/tutor.blade.php ENDPATH**/ ?>