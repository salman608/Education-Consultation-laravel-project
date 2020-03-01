@extends('layouts.backend')
@section('content')

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


             @foreach($notices as $key => $notice)
                  <tr>
                    <td>{{$key + 1}}</td>
                    <td><img src="{{URL::to('upload/notice/'.$notice->image)}}" alt="notice" style="width:140px;height:140px;"></td>
                    <td>{{$notice->created_at}}</td>
                    <td>{{$notice->updated_at}}</td>
                    <td>
                         <a href="{{route('notice.edit',$notice->id)}}" class="btn btn-info">
                              <i class="material-icons">edit</i>
                         </a>
                         <button type="button" class="btn btn-danger" onclick="deletecategory({{ $notice->id }})">
                              <i class="material-icons">delete</i>
                         </button>

                         <form id="delete-form-{{ $notice->id }}" action="{{ route('notice.destroy',$notice->id) }}" method="post" style="display:none;">
                              @csrf
                              @method("DELETE")

                         </form>

                    </td>
                  </tr>

                  @endforeach

              </tbody>
          </table>
    </div>
 </div>

 <div class="card-footer">
  <a href="{{route('notice.create')}}" class="btn btn-success" uk-icon="icon: plus">Add Notice  </a>
 </div>
</div>
 </div>

 @push('js')
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.17.6/dist/sweetalert2.all.min.js"></script>
 {{-- Delete Tag --}}
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
 @endpush

@endsection
