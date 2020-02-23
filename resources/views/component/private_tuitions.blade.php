@if(!empty($jobs))
@foreach($jobs as $job)
<div class="jobboard uk-card uk-card-default uk-card-body uk-card-small uk-text-small uk-margin-medium-bottom">
    <div class="uk-clearfix">
        <span class="uk-text-bold">Tution ID - {{ (empty($job->job_id)) ? 'Not Available' : $job->job_id }}</span>
        <span class="uk-float-right uk-text-bold">Posted on {{ date('d M, Y', strtotime($job->created_at)) }}</span>
    </div>
    <h3 class="uk-card-title uk-text-bold">Need a tutor for {{ $job->relCourse->name }} student</h3>
    <div class="uk-column-1-4@m">
        <div class=""><strong class="uk-text-primary">Category :</strong> {{ $job->relCategories->name }}</div>
        @if(!empty($job->curriculum))
        <div class=""><strong class="uk-text-primary">Curriculum :</strong> {{ $job->curriculum }}</div>
        @endif
        <div class=""><strong class="uk-text-primary">Class :</strong> {{ $job->relCourse->name }}</div>
        <div class="uk-text-capitalize"><strong class="uk-text-primary">Student Gender :</strong> {{ $job->student_gender }}</div>
    </div>
    <div class="uk-text-bold">{{ $job->weekly }} days per week</div>
    <div class="uk-text-capitalize"><strong>Salary :</strong> {{ (!empty($job->salary)) ? $job->salary.' Tk' : 'Negotiate' }}, <strong>Tutor gender preference :</strong> <span class="uk-label uk-label-danger">{{ $job->peferred_gender }}</span> <strong>No. of Students :</strong> {{ $job->no_of_students }}</div>
    <div class="">
        <strong>Subjects :</strong>
        @if(!empty($job->relJbSubject))
            @foreach($job->relJbSubject as $suject)
                <span class="uk-text-primary uk-text-bold">{{ $suject->relSubject->name }}</span>,&nbsp;
            @endforeach
        @endif
    </div>
    <div class=""><strong>Tutoring Time :</strong> {{ (!empty($job->tutoring_time)) ? $job->tutoring_time : 'Negotiate' }}</div>
    <div class=""><strong>Location:</strong>  {{ $job->relCity->name }}, {{ $job->relLocation->name }}</div>
    <div class="uk-padding-small uk-padding-remove-horizontal uk-text-right">
        <form id="applyForm" action="{{ route('job.apply', $job->id) }}">
        <button type="button" class="uk-button uk-button-primary" name="apply">Apply Now</button>
        </form>
    </div>
    <div class="uk-text-meta">Other Requirements - {{ (!empty($job->requirements)) ? $job->requirements : 'Interested tutors are requested to apply.' }}</div>
</div>
@endforeach
@endif