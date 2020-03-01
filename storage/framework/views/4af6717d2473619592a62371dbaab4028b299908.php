<?php $__env->startSection('content'); ?>

 <div class="container-fluid">
  <div class="card mt-4">
 <div class="card-header">
   All Notice
 </div>
 <div class="card-body">
   <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover dataTable js-exportable">
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>Image</th>
                      <th>Created_at</th>
                      <th>Updated_at</th>
                      <th>Action</th>

                  </tr>
              </thead>
              <tbody>


             <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($key + 1); ?></td>
                    <td><img src="<?php echo e(URL::to('upload/notice/'.$notice->image)); ?>" alt="notice" style="width:140px;height:140px;"></td>
                    <td><?php echo e($notice->created_at); ?></td>
                    <td><?php echo e($notice->updated_at); ?></td>
                    <td>
                         <a href="<?php echo e(route('notice.edit',$notice->id)); ?>" class="btn btn-info">
                              <i class="material-icons">edit</i>
                         </a>
                         <button type="button" class="btn btn-danger" onclick="deletecategory(<?php echo e($notice->id); ?>)">
                              <i class="material-icons">delete</i>
                         </button>

                         <form id="delete-form-<?php echo e($notice->id); ?>" action="<?php echo e(route('notice.destroy',$notice->id)); ?>" method="post" style="display:none;">
                              <?php echo csrf_field(); ?>
                              <?php echo method_field("DELETE"); ?>

                         </form>

                    </td>
                  </tr>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </tbody>
          </table>
    </div>
 </div>

 <div class="card-footer">
  <a href="<?php echo e(route('notice.create')); ?>" class="btn btn-success" uk-icon="icon: plus">Add Notice  </a>
 </div>
</div>
 </div>

 <?php $__env->startPush('js'); ?>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.17.6/dist/sweetalert2.all.min.js"></script>
 
       <script type="text/javascript">
          function deletecategory(id){

            const swalWithBootstrapButtons = Swal.mixin({
               customClass: {
               confirmButton: 'btn btn-success',
               cancelButton: 'btn btn-danger'
             },
             buttonsStyling: false
           })

                swalWithBootstrapButtons.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Yes, delete it!',
                  cancelButtonText: 'No, cancel!',
                  reverseButtons: true
                }).then((result) => {
                  if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                  } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                  ) {
                    swalWithBootstrapButtons.fire(
                      'Cancelled',
                      'Your data is safe :)',
                      'error'
                    )
                  }
                });

                    }

</script>
 <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\tutore\resources\views/notice/index.blade.php ENDPATH**/ ?>