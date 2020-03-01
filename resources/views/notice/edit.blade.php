@extends('layouts.backend')
@section('content')

 <div class="container-fluid">
  <div class="card mt-4">
 <div class="card-header">
   Update Notice
 </div>
 <div class="card-body">

   <form class="" action="{{ route('notice.update',$notice->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

   <div class="form-group form-float">
     <label for="">Notice Update</label>
        <div class="form-line">
            <input type="file" id="name" class="form-control" name="image" >
            <br>
              <img src="{{URL::to('upload/notice/'.$notice->image)}}" alt="notice" style="width:140px;height:140px;">
        </div>
    </div>

    <button type="submit" class="btn btn-primary m-t-15 waves-effect"> Update Notice </button>

     </form>
 </div>

 <div class="card-footer">
  <a href="{{route('notice.index')}}" class="btn btn-success" uk-icon="icon: link">View Notice</a>
 </div>
</div>
 </div>

@endsection
