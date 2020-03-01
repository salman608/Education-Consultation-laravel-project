@if(!empty($jobs))

<div class="row">
  @foreach($jobs as $job)
  <div class="col-md-6">
    <div class="tuitions uk-card-hover" id="wave-effect">
        <p class="job-id text-primary"> <span class="btn btn-purple"  style="font-size:10px;">Tution ID - {{ (empty($job->job_id)) ? 'Not Available' : $job->job_id }}</span> <span>Posted on {{ date('d M, Y', strtotime($job->created_at)) }}</span></p>
        <h5>Need a tutor for {{ $job->relCourse->name }} student</h5>
        <!-- <div class="row">
            <div class="col-md-4">
                <p><strong>Category :</strong>  {{ $job->relCategories->name }}</p>
            </div>
            @if(!empty($job->curriculum))
            <div class="col-md-4">
                <p><strong>Curriculum :</strong> {{ $job->curriculum }}</p>
            </div>
            @endif
            <div class="col-md-4">
                <p><strong>Class :</strong> {{ $job->relCourse->name }}</p>
            </div>
            <div class="col-md-4">
                <p><strong>Student Gender :</strong> {{ $job->student_gender }}</p>
            </div>
        </div> -->

        <div class="">
            <div class="block"><strong class="uk-text-primary">Category :</strong> <span class="uk-text-bold">{{ $job->relCategories->name }}</span> </div>
            @if(!empty($job->curriculum))
            <div class=""><strong class="uk-text-primary">Curriculum :</strong><span class="uk-text-bold">{{ $job->curriculum }}</span></div>
            @endif
            <div class=""><strong class="uk-text-primary">Class :</strong> <span class="uk-text-bold">{{ $job->relCourse->name }}</span></div>

            <div class="uk-text-capitalize"><strong class="uk-text-primary">Student Gender :</strong><span class="uk-text-bold"> {{ $job->student_gender }}</span></div>
        </div>

        <!-- <p class="weekly">{{ $job->weekly }} days per week</p>
        <p><strong>Salary :</strong> {{ (!empty($job->salary)) ? $job->salary.' Tk' : 'Negotiate' }}, <strong>Tutor gender preference :</strong> <span class="badge badge-danger">{{ $job->peferred_gender }}</span> <strong>No. of Students :</strong> {{ $job->no_of_students }}</p> -->

        <div class="uk-text-bold"> <strong class="uk-text-primary">Days :</strong>{{ $job->weekly }} days per week</div>
        <div class="uk-text-capitalize">
       <strong class="uk-text-primary">Salary :</strong> <span class="uk-text-bold">{{ (!empty($job->salary)) ? $job->salary.' Tk' : 'Negotiate' }},</span>

        </div>

        <div class=""><strong class="uk-text-primary">Tutor gender preference :</strong><span class="btn btn-danger uk-label" style="padding:0 5px;margin-left:5px;">{{ $job->peferred_gender }}</span></div>

        <div class="uk-text-bold"><strong class="uk-text-primary">No. of Students :</strong>    {{ $job->no_of_students }}</div>
        <!-- <p>
            <strong>Subjects :</strong>
            @if(!empty($job->relJbSubject))
                @foreach($job->relJbSubject as $suject)
                    <span class="badge badge-success">{{ $suject->relSubject->name }}</span>
                @endforeach
            @endif
        </p>
        <p><strong>Tutoring Time :</strong> {{ (!empty($job->tutoring_time)) ? $job->tutoring_time : 'Negotiate' }}</p>
        <p><strong>Location:</strong>  {{ $job->relCity->name }}, {{ $job->relLocation->name }}</p> -->

        <div class="">
            <strong class="uk-text-primary">Subjects :</strong>
            @if(!empty($job->relJbSubject))
                @foreach($job->relJbSubject as $suject)
                    <span class=" uk-text-bold">{{ $suject->relSubject->name }}</span>,&nbsp;
                @endforeach
            @endif
        </div>
        <div class=""><strong class="uk-text-primary">Tutoring Time :</strong> <span class="uk-text-bold"> {{ (!empty($job->tutoring_time)) ? $job->tutoring_time : 'Negotiate' }}</span></div>

        <div class=""><strong class="uk-text-primary">Location:</strong><span class="uk-text-bold">{{ $job->relCity->name }}, {{ $job->relLocation->name }}</span></div>
        <form id="applyForm" action="{{ route('job.apply', $job->id) }}">
            <button type="button" class="btn btn-primary btn-sm" name="apply">Apply Now</button>
        </form>
        <p style="font-weight:bold;"><em>Other Requirements - {{ (!empty($job->requirements)) ? $job->requirements : 'Interested tutors are requested to apply.' }}</em></p>
    </div>
  </div>

  @endforeach
</div>

@endif
