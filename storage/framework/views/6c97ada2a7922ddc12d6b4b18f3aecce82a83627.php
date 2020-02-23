<script type="text/javascript">
$( document ).ready(function() {
	toastr.options = {
        "closeButton": false,
        "positionClass": "toast-top-center",
    }

    <?php if(session()->has('message.success')): ?>
        toastr.success('<?php echo e(session("message.success")); ?>', '<?php echo e($slot); ?>');
    <?php endif; ?>

    <?php if(session()->has('message.error')): ?>
        toastr.error('<?php echo e(session("message.error")); ?>', '<?php echo e($slot); ?>');
    <?php endif; ?>
});
</script><?php /**PATH /home/tutorprovide/public_html/resources/views/component/alert.blade.php ENDPATH**/ ?>