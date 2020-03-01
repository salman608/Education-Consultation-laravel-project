@extends('layouts.backend')
@section('content')
<div class="uk-card">
	<div class="uk-card-body">
	    <h3 class="uk-heading-divider uk-clearfix">
		    Need a {{ $job->relCategories->name }} - {{ $job->relCourse->name }} Tutor
		    @if(in_array($job->is_published, ['reviewing', 'published']))
		    <a class="uk-button uk-button-primary uk-float-right" href="{{ route('jobs.edit', $job->id) }}"><span uk-icon="plus-pencil"></span> <strong class="button-text-hide">Edit Tuition Job</strong></a>
			@endif
		</h3>
	</div>
    <div class="uk-card-header uk-card-primary uk-text-bold">
    	Subjects :
    	@if(!empty($job->relJbSubject))
	    	@foreach($job->relJbSubject as $suject)
	    		{{ $suject->relSubject->name }},&nbsp;
	    	@endforeach
    	@endif
    </div>

    <div class="uk-card-header uk-card-primary uk-text-bold">Contact Info :</div>
    <div class="uk-card-body">
		<div class="uk-grid-small" uk-grid>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Name</dt>
				    <dd>{{ $job->relUser->name }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Email</dt>
				    <dd>{{ $job->relUser->email }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Phone</dt>
				    <dd>{{ $job->relGuardianProfile->phone }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Address</dt>
				    <dd>{{ $job->relGuardianProfile->address }}</dd>
				</dl>
		    </div>
		</div>
	</div>

    <div class="uk-card-header uk-card-primary uk-text-bold">Requirement details :</div>
    <div class="uk-card-body">
		<div class="uk-grid-small" uk-grid>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Tution ID</dt>
				    <dd>{{ (empty($job->job_id)) ? $job->id : $job->job_id }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Category</dt>
				    <dd>{{ $job->relCategories->name }} @if(!empty($job->curriculum))<strong>Curriculum : </strong> {{ $job->curriculum }} @endif</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Class</dt>
				    <dd>{{ $job->relCourse->name }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Preferred gender</dt>
				    <dd class="uk-text-capitalize">{{ $job->peferred_gender }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Weekly</dt>
				    <dd>{{ $job->weekly }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Salary</dt>
				    <dd>{{ (!empty($job->salary)) ? $job->salary.' Tk' : 'Negotiate' }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Hire Date</dt>
				    <dd>{{ $job->hire_date }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Description</dt>
				    <dd>{{ $job->requirements }}</dd>
				</dl>
		    </div>
		</div>
	</div>

	@if(count($job->relAppliedJobs))
	<div class="uk-card-header uk-card-primary uk-text-bold">Applied Tutor's :</div>
    <div class="uk-child-width-1-2@m" uk-grid>
    @foreach($job->relAppliedJobs as $applied_job)
	<div class="uk-card">
	    <div class="uk-card-header uk-padding-remove-bottom">
	        <div class="uk-grid-small uk-flex-middle" uk-grid>
	            <div class="uk-width-auto">
	                <img class="uk-border-circle uk-box-shadow-medium" width="80" height="80" src="{{ (!empty($applied_job->relTutorProfile->photo)) ? asset('storage/upload/'.$applied_job->relTutorProfile->photo.'') : asset('storage/upload/default-profile.png') }}">

	            </div>
	            <div class="uk-width-expand">
	                <h3 class="uk-card-title uk-margin-remove-bottom uk-text-bold">{{ $applied_job->relTutorProfile->relUser->name }}</h3>
	                <p class="uk-text-emphasis uk-margin-remove-top">{{ (!empty($applied_job->relTutorProfile->relCity->name)) ? $applied_job->relTutorProfile->relCity->name.' ,' : "" }} {{ (!empty($applied_job->relTutorProfile->relLocation->name)) ? $applied_job->relTutorProfile->relLocation->name : "" }}</p>
	                <p class="uk-margin-remove-top uk-text-bold uk-text-emphasis">Profile Completed: {{ App\TutorProfile::tutorProfilePercentage( $applied_job->relTutorProfile ) }}%</p>
	            </div>
	        </div>
	    </div>
	    <div class="uk-card-body uk-margin uk-padding-remove-top uk-padding-remove-bottom">
			<div class="uk-grid-small" uk-grid>
				<div class="">


					<p style="color:black;font-weight: bold;"> <strong>Tutor's E-mail</strong> :  {{ $applied_job->relTutorProfile->relUser->email }}</p>
					<p style="color:black;font-weight: bold;"> <strong>Tutor's Contact</strong>:   {{ $applied_job->relTutorProfile->phone }}</p>
					<p style="color:black;font-weight: bold;"> <strong>Tutor's Institute</strong>: </p>


				</div>
			    <!-- <div class="uk-width-1-2@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>Tutor's E-mail</dt>
					    <dd>{{ $applied_job->relTutorProfile->relUser->email }}</dd>
					</dl>
			    </div> -->
			    <!-- <div class="uk-width-1-2@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>Tutor's Contact</dt>
					    <dd>{{ $applied_job->relTutorProfile->phone }}</dd>
					</dl>
			    </div> -->
<!--
					<div class="uk-width-1-2@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>University</dt>
					    <dd></dd>
					</dl>
			    </div> -->
			</div>
	    </div>
	    <div class="uk-card-footer">
	        <a href="{{ route('tutors.show', $applied_job->user_id) }}" class="uk-button uk-button-primary" target="_blank">View Profile</a>
	    </div>
	</div>
	@endforeach
	</div>
	<hr class="uk-divider-icon">
	@endif

	{{ Form::open(['method' => 'delete', 'route' => ['jobs.delete', $job->id], 'class' => 'uk-padding-small logout-form']) }}

		@if($job->is_published == 'reviewing')
        <button type="submit" class="uk-button uk-button-danger"><strong class="uk-margin-small-right" uk-icon="icon: trash"></strong> <span>{{ __('Delete Tuition Job') }}</span></button>
        @endif

        @if($job->is_published == 'published')
        <button type="submit" class="uk-button uk-button-primary"><strong class="uk-margin-small-right" uk-icon="icon: check"></strong> <span>{{ __('Complete Tuition Job') }}</span></button>
        @endif

        @if($job->is_published == 'reviewing')
    	<a class="uk-button uk-button-secondary uk-float-right" href="{{ route('jobs.approve', $job->id) }}"><span uk-icon="check"></span> <strong class="button-text-hide">{{ __('Approve Tution Job') }}</strong></a>
    	@endif

    {{ Form::close() }}
</div>
@endsection
