<?php $__env->startSection('content'); ?>
<div class="uk-card uk-card-body uk-card-small">
    <h3 class="uk-heading-divider uk-clearfix">Upload Your Documents</h3>
    <form id="uploadCredentialsForm" action="javaScript:;" enctype="multipart/form-data">
    	<?php echo csrf_field(); ?>
		<div class="uk-margin">
			<label class="uk-form-label" for="form-stacked-text">Select Documents type <span class="uk-text-danger">(Requied *)</span></label>
	        <?php echo e(Form::select('credential_type', ['SSC/O Level Marksheets/ certificates' => 'SSC/O Level Marksheets/ certificates','HSC/A Level Marksheets/ certificates' => 'HSC/A Level Marksheets/ certificates', 'NID/ Passport/ Birth certificates' => 'NID/ Passport/ Birth certificates', 'University ID' => 'University ID', 'Others' => 'Others'], null, ['id' => 'credential_type', 'placeholder' => 'Select Documents type', 'class' => 'uk-select  uk-form-large'])); ?>

	        <p class="uk-margin-remove-top uk-text-danger error credential_type">
	            <?php if ($errors->has('credential_type')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('credential_type'); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
	        </p>
	    </div>
	    <div class="uk-grid-small" uk-grid>
		    <div class="uk-width-1-2@s">
		    	<p class="uk-text-bold">1.SSC/O Level Marksheets/certificates</p>
		    	<p class="uk-text-bold">2.HSC/A Level Marksheets/certificates</p>
		    	<p class="uk-text-bold">3.NID/ Passport/ Birth certificate <span class="uk-text-danger">( Must be upload )</span></p>
		    	<p class="uk-text-bold">4.University ID <span class="uk-text-danger">( Must be upload )</span></p>
		    </div>
		    <div class="uk-width-1-2@s">
				<div class="js-upload uk-placeholder uk-text-center">
					<span uk-icon="icon: cloud-upload"></span>
					<span class="uk-text-middle">Click here to Documents upload</span>
					<label for="credentials_files" class="uk-button uk-button-primary">Upload</label>
					<input id="credentials_files" type="file" style="display: none;" name="credentials_files">
					<p><strong>Maximum upload Documents size 5MB</strong></p>
				</div>
		        <p class="uk-margin-remove-top uk-text-danger error credentials_files">&nbsp;</p>
		    </div>
	   	</div>
	   	<progress id="js-progressbar" class="uk-progress" value="0" max="100"></progress>
	   	<div class="uk-margin">
	        <button type="submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1"><?php echo e(__('Send')); ?></button>
	    </div>
   	</form>
    <p class="uk-text-bold">Note: In case you don't have the scanner you can take the pictures by your smartphone to upload them. Make sure file size will not more than 5 MB. You can’t upload more than 4 Documents.</p>
</div>
<script type="text/javascript">
$("#credential_type").change(function(){
	$("#js-progressbar").val(0);
})
$("#uploadCredentialsForm").submit(function() {
	var formData = new FormData();
	$('#uploadCredentialsForm input, #uploadCredentialsForm select, #uploadCredentialsForm textarea').each(function(i,item){
		if(item.type == 'file'){
			formData.append(item.name,item.files[0]);
		}else {
			formData.append(item.name,item.value);
		}
	})

    axios.post('<?php echo e(route("tutor.profile.store_credentials")); ?>', formData, {
        headers: {
          'Content-Type': 'multipart/form-data'
        },
		onUploadProgress: function( progressEvent ) {
			var uploadPercentage = parseInt( Math.round( ( progressEvent.loaded * 100 ) / progressEvent.total ) );
			$("#js-progressbar").val(uploadPercentage);
		}
    })
    .then(function (response) {
    	console.log(response);
        $(".error.uk-text-danger").html("&nbsp;");
        toastr.success(response.data.success);
        $("#credential_type").focus();
    })
    .catch(function (error) {
    	console.log(error.response);
        $(".error.uk-text-danger").html("&nbsp;");
        $.each(error.response.data.errors, function(index, value){
            $(".error." + index + "").html(value[0]);
        });
        if (error.response.data.errors != null) {
        	toastr.error(error.response.data.message);
        }
        if (error.response.data.error != null) {
        	toastr.error(error.response.data.error);
        }
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tutorprovide/public_html/resources/views/profile/tutor/upload_credentials.blade.php ENDPATH**/ ?>