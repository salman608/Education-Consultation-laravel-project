<?php $__env->startSection('content'); ?>
<div class="uk-card uk-card-body uk-card-small">
    <div class="uk-card-header uk-card-primary">
        <div class="uk-grid-small uk-flex-middle header_profile" uk-grid>
            <div class="uk-width-auto">
                <img class="uk-border-circle uk-box-shadow-medium" id="imgOutput" width="100" height="100" src="<?php echo e((!empty($profile->photo)) ? asset('storage/upload/'.$profile->photo.'') : asset('storage/upload/default-profile.png')); ?>">
            </div>
            <div class="uk-width-expand">
                <h5 class="uk-card-title uk-margin-remove-bottom uk-text-bold"><?php echo e(auth()->user()->name); ?></h5>
                <p class="uk-margin-remove-top uk-text-bold uk-text-emphasis">Upload Profile Picture</p>
            </div>
        </div>
    </div>
    <div class="uk-card-body uk-text-center">
    	<form id="" action="javaScript:;" enctype="multipart/form-data">
			<?php echo csrf_field(); ?>
			<div id="uploaddemo"></div>
			<div class="js-upload" uk-form-custom>
				<input type="file" id="profile_photo" name="profile_photo">
				<button class="uk-button uk-button-primary" type="button" tabindex="-1"><span uk-icon="cloud-upload"></span> Click here to upload file</button>
			</div>
			<button type="submit" class="uk-button uk-button-danger" id="cropButton">Crop & Save</button>
		</form>
	</div>
</div>

<script type="text/javascript">
var url;
var basic = $('#uploaddemo').croppie({
    viewport: { width: 200, height: 200 },
    boundary: { width: 240, height: 240 },
    url: ""
});
function readFile(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#uploaddemo').croppie('bind', {
				url: e.target.result
			});
		}

		reader.readAsDataURL(input.files[0]);
	}
}
$('#profile_photo').on('change', function () {
	readFile(this);
});
$('#cropButton').on('click', function (ev) {
	basic.croppie('result', {
	type: 'base64',
	format: 'jpeg',
	size: {
		width: 100,
		height: 100
	}
	}).then(function (resp) {
		$('#imgOutput').attr('src', resp);

		axios.post('<?php echo e(route("tutor.profile.store_profile_photo")); ?>', {"profile_photo":resp})
        .then(function (response) {
            console.log(response);
        	toastr.success(response.data.success);
        })
        .catch(function (error) {
            console.log(error.response);
        });
	});
});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tutorprovide/public_html/resources/views/profile/tutor/upload_profile_photo.blade.php ENDPATH**/ ?>