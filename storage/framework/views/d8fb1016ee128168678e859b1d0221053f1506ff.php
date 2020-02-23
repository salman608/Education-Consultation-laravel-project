<?php $__env->startSection('content'); ?>
<div class="uk-card uk-card-body uk-card-small payment">
    <h3 class="uk-heading-divider uk-margin-small-bottom">Payment Information</h3>

    <div class="uk-card uk-card-default uk-margin-medium-bottom">
        <div class="uk-card-header">
            <div class="uk-grid-small uk-flex-middle" uk-grid>
                <div class="uk-width-auto">
                    <img class="" width="115" height="67" src="<?php echo e(asset('assets/images/bkash-logo.png')); ?>">
                </div>
                <div class="uk-width-expand">
                    <h3 class="uk-card-title uk-margin-remove-bottom">bKash Personal Number</h3>
                    <p class="uk-text-meta uk-text-large uk-margin-remove-top uk-text-bold">01703 - 681178</p>
                </div>
            </div>
        </div>
    </div>
    <div class="uk-card uk-card-default">
        <div class="uk-card-header">
            <div class="uk-grid-small uk-flex-middle" uk-grid>
                <div class="uk-width-auto">
                    <img class="" width="160" height="80" src="<?php echo e(asset('assets/images/rocket.png')); ?>">
                </div>
                <div class="uk-width-expand">
                    <h3 class="uk-card-title uk-margin-remove-bottom">Rocket Personal Number</h3>
                    <p class="uk-text-meta uk-text-large uk-margin-remove-top uk-text-bold">01759 - 9847969</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\tutore\resources\views/settings/payment.blade.php ENDPATH**/ ?>