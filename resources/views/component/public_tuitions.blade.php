@if(!empty($jobs))
@foreach($jobs as $job)
<div class="tuitions">
    <p class="job-id text-primary">Tution ID - {{ (empty($job->job_id)) ? 'Not Available' : $job->job_id }} <span>Posted on {{ date('d M, Y', strtotime($job->created_at)) }}</span></p>
    <h5>Need a tutor for {{ $job->relCourse->name }} student</h5>
    <div class="row">
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
    </div>
    <p class="weekly">{{ $job->weekly }} days per week</p>
    <p><strong>Salary :</strong> {{ (!empty($job->salary)) ? $job->salary.' Tk' : 'Negotiate' }}, <strong>Tutor gender preference :</strong> <span class="badge badge-danger">{{ $job->peferred_gender }}</span> <strong>No. of Students :</strong> {{ $job->no_of_students }}</p>
    <p>
        <strong>Subjects :</strong>
        @if(!empty($job->relJbSubject))
            @foreach($job->relJbSubject as $suject)
                <span class="badge badge-success">{{ $suject->relSubject->name }}</span>
            @endforeach
        @endif
    </p>
    <p><strong>Tutoring Time :</strong> {{ (!empty($job->tutoring_time)) ? $job->tutoring_time : 'Negotiate' }}</p>
    <p><strong>Location:</strong>  {{ $job->relCity->name }}, {{ $job->relLocation->name }}</p>
    <form id="applyForm" action="{{ route('job.apply', $job->id) }}">
        <button type="button" class="btn btn-primary btn-sm" name="apply">Apply Now</button>
    </form>
    <p><em>Other Requirements - {{ (!empty($job->requirements)) ? $job->requirements : 'Interested tutors are requested to apply.' }}</em></p>
</div>
@endforeach
@endif