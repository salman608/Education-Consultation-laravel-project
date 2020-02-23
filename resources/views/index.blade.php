@extends('layouts.frontend')
@section('content')
<div class="fetured-images owl-carousel owl-theme">
    <div class="item">
        <img src="{{ asset('assets/images/graduate-being-proud-with-copy-space_23-2148232785.jpg') }}" alt="">
    </div>
    <div class="item">
        <img src="{{ asset('assets/images/happy-mother-met-her-daughter-after-classes-outdoors-primary-school_106029-654.jpg') }}" alt="">
    </div>
    <div class="item">
        <img src="{{ asset('assets/images/portrait-student-child-girl-studying-library_1150-5912.jpg') }}" alt="">
    </div>
    <div class="item">
        <img src="{{ asset('assets/images/teacher-correcting-mistakes-pupil-s-notebook_1098-2798.jpg') }}" alt="">
    </div>
    <div class="item">
        <img src="{{ asset('assets/images/kids-school_1098-321.jpg') }}" alt="">
    </div>
</div>
<div class="blocks categories_hide_lg">
    <img src="{{ asset('assets/images/banner.png') }}" alt="Advertiesment">
</div>
@if(count($premium_tutors) > 0)
<div class="blocks">
    <h5 class="title">Premium tutors</h5>
    <div class="premium-tutors owl-carousel owl-theme">
        @foreach($premium_tutors as $premium_tutor)
        <div class="item">
            <div class="row">
                @foreach($premium_tutor as $tutor)
                <div class="col-md-6">
                    <a href="" class="media">
                        <img src="{{ (!empty($tutor->photo)) ? asset('storage/upload/'.$tutor->photo.'') : asset('storage/upload/default-profile.png') }}" class="mr-2 rounded-circle" alt="..." style="width: 70px;">
                        <div class="media-body">
                            <h5 class="mt-0">{{ $tutor->relUser->name }}</h5>
                            <p class="text-secondary">{!! (count($tutor->relTpEducational) > 0) ? $tutor->relTpEducational[0]->institute_name : '&nbsp;' !!}</p>
                            <p class="text-success">{!! (count($tutor->relTpEducational) > 0) ? $tutor->relTpEducational[0]->group_name : '&nbsp;' !!}</p>
                            <p class="text-info">{!! (!empty($tutor->address)) ? $tutor->address : '&nbsp;' !!}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
@if(count($hot_jobs) > 0)
<div class="blocks">
    <h5 class="title">Hot Jobs</h5>
    <div class="hot-jobs owl-carousel owl-theme">
        @foreach($hot_jobs as $hot_job)
        <div class="item">
            <div class="row">
                @foreach($hot_job as $job)
                <div class="col-md-6">
                    <div class="jobs" title="Tution ID - {{ (empty($job->job_id)) ? $job->id : $job->job_id }}">
                        <p>Tution ID - {{ (empty($job->job_id)) ? $job->id : $job->job_id }}</p>
                        <p><a href="">Need a tutor for {{ $job->relCourse->name }} student</a></p>
                        <p><small><em>Posted on {{ date('d M, Y', strtotime($job->created_at)) }}</em></small></p>
                        <p><strong>Salary :</strong> {{ (!empty($job->salary)) ? $job->salary.' Tk' : 'Negotiate' }}</p>
                        <p>{{ $job->relCategories->name }}, {{ $job->relCourse->name }}</p>
                        <p>{{ $job->relCity->name }}, {{ $job->relLocation->name }}</p>
                        <form id="applyForm" action="{{ route('job.apply', $job->id) }}" class="mt-2 text-right">
                            <button type="button" class="btn btn-primary btn-sm" name="apply">Apply Now</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>
<form id="ajaxLoginModal" class="modal" tabindex="-1" role="dialog" action="javaScript:;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Sign In') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autocomplete="email" autofocus>
                    <small id="email_help" class="form-text text-muted">@error('email') {{ $message }} @enderror</small>
                </div>
                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">
                    <small id="password_help" class="form-text text-muted">@error('password') {{ $message }} @enderror</small>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-success btn-sm mr-auto" href="{{ route('register.tutor') }}">{{ __('Tutor Registration') }}</a>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">{{ __('Login') }}</button>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">
$(document).ready(function(){
    $(document).on('click', 'button[name="apply"]', function(){
        axios.get($(this).parent('form').attr('action'))
        .then(function (response) {
            toastr.success(response.data.success);
        })
        .catch(function (error) {
            console.log(error.response)
            if (error.response.status == '400') {
                if (error.response.data.error != null) {
                toastr.error(error.response.data.error);
                }
            }
            else
            {
                $('#ajaxLoginModal').modal('show')
            }
        });
    });

    $("#ajaxLoginModal").submit(function() {
        axios.post('{{ route("login_tutor") }}', $(this).serialize())
        .then(function (response) {
            console.log(response)
            $(".form-text.text-muted").html("&nbsp;");
            toastr.success(response.data.success);
            $('#ajaxLoginModal').modal('hide')
        })
        .catch(function (error) {
            console.log(error.response)
            $(".form-text.text-muted").html("&nbsp;");
            $.each(error.response.data.errors, function(index, value){
                $(".error_" + index + "").html(value[0]);
            });
            if (error.response.data.errors != null) {
            toastr.error(error.response.data.message);
            }
            if (error.response.data.error != null) {
            toastr.error(error.response.data.error);
            }
        });
    });
});
</script>
@endif
<div class="blocks">
    <h5 class="title">Rating</h5>
    <div class="row">
        <div class="col-md-3">
            <div class="rating">
                3410<strong>Total Applied</strong>
            </div>
        </div>
        <div class="col-md-3">
            <div class="rating">
                49<strong>Live Tuition Jobs</strong>
            </div>
        </div>
        <div class="col-md-3">
            <div class="rating">
                3133<strong>Happy Students</strong>
            </div>
        </div>
        <div class="col-md-3">
            <div class="rating">
                4.5 / 5<strong>Average Tutor Rating</strong>
            </div>
        </div>
    </div>
</div>
@endsection