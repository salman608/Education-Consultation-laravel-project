<?php $__env->startSection('content'); ?>

 <div class="container-fluid">
  <div class="card mt-4">
 <div class="card-header">
   Add Notice
 </div>
 <div class="card-body">

   <form class="" action="<?php echo e(route('notice.store')); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

   <div class="form-group form-float">
     <label for="">Image Notice Upload</label>
        <div class="form-line">
            <input type="file" id="name" class="form-control" name="image" placeholder="Chose your notice">

        </div>
    </div>

    <button type="submit" class="btn btn-primary m-t-15 waves-effect"> PUBLISH Notice </button>

     </form>
 </div>

 <div class="card-footer">
  <a href="<?php echo e(route('notice.index')); ?>" class="btn btn-success" uk-icon="icon: link">View Notice</a>
 </div>
</div>
 </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\tutore\resources\views/notice/create.blade.php ENDPATH**/ ?>