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

     <!-- Profile photo upload instruction  -->
      <div class="card"  style="border: 1px solid #10a510">
      <div class="card-header text-center" style="background:#10a510;color:white;border-radius: 4px 4px 0 0;border:1px solid #10a510;">
          <h2>How to upload a perfect profile picture</h2>
      </div>
      <div class="card-body" style="color:black;">

              <p>You have excellent educational background and good experience of tutoring, but you’re having a hard time to find new tuitions. Sound familiar? If so, consider the first impression your profile makes with prospective client.</p>
              <p>Your profile is how you present yourself to the world. And if a picture is worth a thousand words, what does your profile picture say about you? Does it say you’re friendly, professional, and easy to get along with?</p>
              <p>Client look at profile photos to get a sense of who you are…and if they don’t see a photo that conveys friendliness and professionalism, you may get overlooked. To help you attract client and stand out from the crowd, keep these guidelines in mind when you’re snapping your pics.</p>
              <p><strong>1) Find your best light</strong></p>
              <p>Shady areas outdoors, without direct sunlight, are a great lighting choice. Inside, avoid overhead light, which creates harsh shadows, and instead look for natural light.</p>
              <p><strong>2) Simplify the background</strong></p>
              <p>Look for a background that is clear and uncluttered. A solid, not-too-bright wall or simple outdoor background works well.</p>
              <p><strong>3) Focus on your face</strong></p>
              <p>Face the camera straight on or with your shoulders at a slight angle. Crop so that you only include your head and the top of your shoulders.</p>
              <p><strong>4) Smile! (You’ll land more jobs)</strong></p>
              <p>Clients find smiling tutors more warm, friendly, and trustworthy. Not used to smiling for the camera? Try pretending that you are greeting your best friend.</p>

              <h4 class="uk-text-center uk-text-bold uk-margin-small-top">Do & Don't Examples (Male)</h4>
              <img  src="<?php echo e(asset('assets/images/male_example.jpg')); ?>" alt="" style="margin:auto">
              <h4 class="uk-text-center uk-text-bold uk-margin-small-top">Do & Don't Examples (Female)</h4>
              <img src="<?php echo e(asset('assets/images/female_example.jpg')); ?>" alt="" style="margin:auto">
      </div>
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
            window.location.href = 'profile/edit';
        })
        .catch(function (error) {
            console.log(error.response);
        });
	});
});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\tutore\resources\views/profile/tutor/upload_profile_photo.blade.php ENDPATH**/ ?>