@extends('layouts.backend')
@section('content')

 <div class="container-fluid">
  <div class="card mt-4">
 <div class="card-header">
   Add Notice
 </div>
 <div class="card-body">

   <form class="" action="{{ route('notice.store') }}" method="post" enctype="multipart/form-data">
    @csrf

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
  <a href="{{route('notice.index')}}" class="btn btn-success" uk-icon="icon: link">View Notice</a>
 </div>
</div>
 </div>

@endsection
