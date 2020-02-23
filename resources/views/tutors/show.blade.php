@extends('layouts.backend')
@section('content')

<div class="uk-card uk-card-body uk-card-small">
    <div class="uk-card-header uk-card-primary uk-margin-small-bottom">
        <div class="uk-grid-small uk-flex-middle" uk-grid>
            <div class="uk-width-auto">
                <img class="uk-border-circle uk-box-shadow-medium" width="80" height="80" src="{{ (!empty($profile->photo)) ? asset('storage/upload/'.$profile->photo.'') : asset('storage/upload/default-profile.png') }}">
            </div>
            <div class="uk-width-expand">
                <h3 class="uk-card-title uk-margin-remove-bottom uk-text-bold">{{ $profile->relUser->name }} [ {{ $profile->relUser->email }} ]</h3>
                <p class="uk-text-emphasis uk-margin-remove-top">Profile Completed: {{ $percentage }}%</p>
            </div>
        </div>
    </div>
    <div class="uk-card-header uk-card-primary uk-text-bold">Personal Information</div>
    <div class="uk-card-body">
		<div class="uk-grid-small" uk-grid>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Tutor ID</dt>
				    <dd>{{ $profile->relUser->id }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Registration Date Time</dt>
				    <dd>{{ date('d-m-Y h:m:s a', strtotime($profile->relUser->created_at)) }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your E-mail</dt>
				    <dd>{{ $profile->relUser->email }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Gender</dt>
				    <dd>{{ (!empty($profile->gender)) ? $profile->gender : $empty }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Contact Number</dt>
				    <dd>{{ $profile->phone }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-1@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Address</dt>
				    <dd>{{ (!empty($profile->address)) ? $profile->address : $empty }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-1@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Birth Certificate No</dt>
				    <dd>{{ (!empty($profile->identity)) ? $profile->identity : $empty }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Facebook ID</dt>
				    <dd><a href="{{ $profile->facebook_link }}">{{ (!empty($profile->facebook_link)) ? $profile->facebook_link : $empty }}</a></dd>
				</dl>
		    </div>
	    </div>
	</div>
    <div class="uk-card-header uk-card-primary uk-text-bold">Parents Information</div>
    <div class="uk-card-body">
		<div class="uk-grid-small" uk-grid>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Father Name</dt>
				    <dd>{{ (!empty($profile->father_name)) ? $profile->father_name : $empty }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Father Mobile No.</dt>
				    <dd>{{ (!empty($profile->father_mobile_no)) ? $profile->father_mobile_no : $empty }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Mother Name</dt>
				    <dd>{{ (!empty($profile->mother_name)) ? $profile->mother_name : $empty }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Mother Mobile No.</dt>
				    <dd>{{ (!empty($profile->mother_mobile_no)) ? $profile->mother_mobile_no : $empty }}</dd>
				</dl>
		    </div>
		</div>
	</div>
    <div class="uk-card-header uk-card-primary uk-text-bold">Emergency Contact Info</div>
    <div class="uk-card-body">
		<div class="uk-grid-small" uk-grid>
		    <div class="uk-width-1-1@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Emergency Contact Name</dt>
				    <dd>{{ (!empty($profile->emergency_name)) ? $profile->emergency_name : $empty }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-1@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Emergency Contact Address</dt>
				    <dd>{{ (!empty($profile->emergency_address)) ? $profile->emergency_address : $empty }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Contact No.</dt>
				    <dd>{{ (!empty($profile->emergency_mobile_no)) ? $profile->emergency_mobile_no : $empty }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Relation</dt>
				    <dd>{{ (!empty($profile->emergency_relation)) ? $profile->emergency_relation : $empty }}</dd>
				</dl>
		    </div>
		</div>
	</div>
    <div class="uk-card-header uk-card-primary uk-text-bold">Tuition Related Information</div>
    <div class="uk-card-body">
		<p class="uk-text-primary uk-text-bold">Your Selected Category Info</p>
		<div class="uk-margin">
			@if(count($profile->relTpCategories))
				@php
				$profile->relTpCategories->map(function ($loop) {
				@endphp
				<span class="uk-label uk-label-success">{{ $loop->relCategory->name }}</span>
		        @php
		    	});
				@endphp
			@else
				{{ $empty }}
			@endif
		</div>

		<p class="uk-text-primary uk-text-bold">Preferable Classes and Subjects</p>
		<div class="uk-margin">
			@if(count($profile_courses_subjects))
				@foreach ($profile_courses_subjects as $key => $course)
				<p><span class="uk-label uk-label-success">{{ $key }}</span> <span class="uk-label uk-label-primary">{{ implode(", ", $course) }}</span> </p>
				@endforeach
			@else
				{{ $empty }}
			@endif
		</div>
		<p class="uk-text-primary uk-text-bold">Your Selected Location Info</p>
		<div class="uk-grid-small" uk-grid>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your City</dt>
				    <dd>{{ (!empty($profile->relCity->name)) ? $profile->relCity->name : $empty }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Location</dt>
				    <dd>{{ (!empty($profile->relLocation->name)) ? $profile->relLocation->name : $empty }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-1@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Preferred Location</dt>
				    <dd>
				    	@if(count($profile->relTpPreferredLocations))
							@php
							$profile->relTpPreferredLocations->map(function ($loop) {
							@endphp
							<span class="uk-label uk-label-success">{{ $loop->relLocation->name }}</span>
					        @php
					    	});
							@endphp
						@else
							{{ $empty }}
						@endif
				    </dd>
				</dl>
		    </div>
		</div>
		<p class="uk-text-primary uk-text-bold">Where Do You Want to Provide Your Service?</p>
		<div class="uk-margin">
			@if(count($profile->relTpProvideService))
			@php
				$profile->relTpProvideService->map(function ($loop) {
				@endphp
				<span class="uk-label uk-label-success">{{ $loop->name }}</span>
		        @php
		    	});
				@endphp
			@else
				{{ $empty }}
			@endif
		</div>
		<p class="uk-text-primary uk-text-bold">Experience Info</p>
		<div class="uk-grid-small" uk-grid>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Do you have any tutoring experience?</dt>
				    <dd>{{ (!empty($profile->have_experience)) ? $profile->have_experience : $empty }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your total experience?</dt>
				    <dd>{{ (!empty($profile->experience)) ? $profile->experience : $empty }}</dd>
				</dl>
		    </div>
		</div>
		<p class="uk-text-primary uk-text-bold">Availability / Salary</p>
		<div class="uk-grid-small" uk-grid>
		    <div class="uk-width-1-1@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Available Days</dt>
				    <dd>
				    	@if(count($profile->relTpAvailability))
							@php
							$profile->relTpAvailability->map(function ($loop) {
							@endphp
							<span class="uk-label uk-label-success">{{ $loop->day }}</span>
					        @php
					    	});
							@endphp
						@else
							{{ $empty }}
						@endif
				    </dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>You Available From</dt>
				    <dd>{{ (!empty($profile->from_time)) ? $profile->from_time : $empty }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Available To</dt>
				    <dd>{{ (!empty($profile->to_time)) ? $profile->to_time : $empty }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>You Expected Salary (BDT)</dt>
				    <dd>{{ (!empty($profile->salary)) ? $profile->salary : $empty }} Tk</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Tuition Style</dt>
				    <dd>
				    	@if(count($profile->relTpTutoringStyle))
							@php
							$profile->relTpTutoringStyle->map(function ($loop) {
							@endphp
							<span class="uk-label uk-label-success">{{ $loop->name }}</span>
					        @php
					    	});
							@endphp
						@else
							{{ $empty }}
						@endif
				    </dd>
				</dl>
		    </div>
		</div>
	</div>
    <div class="uk-card-header uk-card-primary uk-text-bold">Education Information</div>
    <div class="uk-card-body">
    	@if(count($profile->relTpEducational))
			@php
			$profile->relTpEducational->map(function ($loop) {
			@endphp
			<div class="uk-grid-small" uk-grid>
			    <div class="uk-width-1-3@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>Level Of Education</dt>
					    <dd>{{ $loop->level_of_education }}</dd>
					</dl>
			    </div>
			    <div class="uk-width-1-3@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>Exam / Degree</dt>
					    <dd>{{ $loop->degree_title }}</dd>
					</dl>
			    </div>
			    <div class="uk-width-1-3@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>Concentration / Major / Group</dt>
					    <dd>{{ $loop->group_name }}</dd>
					</dl>
			    </div>
			    <div class="uk-width-1-1@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>Institute Name</dt>
					    <dd>{{ $loop->institute_name }}</dd>
					</dl>
			    </div>
			    <div class="uk-width-1-3@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>GPA / CGPA</dt>
					    <dd>{{ $loop->result }}</dd>
					</dl>
			    </div>
			    <div class="uk-width-1-3@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>Year of passing</dt>
					    <dd>{{ $loop->year_of_passing }}</dd>
					</dl>
			    </div>
			    <div class="uk-width-1-3@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>Curriculum</dt>
					    <dd>{{ $loop->curriculum }}</dd>
					</dl>
			    </div>
			    <div class="uk-width-1-2@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>From Date</dt>
					    <dd>{{ $loop->from_date }}</dd>
					</dl>
			    </div>
			    <div class="uk-width-1-2@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>Until Date</dt>
			    		@if($loop->is_until)
					    <dd>I'm currently studying here</dd>
			    		@endif
			    		@if($loop->is_until == false)
					    <dd>{{ $loop->until_date }}</dd>
			    		@endif
					</dl>
			    </div>
			</div>
			<hr>
	        @php
	    	});
			@endphp
		@else
			{{ $empty }}
		@endif
    </div>
    <div class="uk-card-header uk-card-primary uk-text-bold">Tutor Credentials</div>
    <div class="uk-card-body">
    	@if(count($profile->relTpCredential))
    	<div class="uk-grid-small" uk-grid>
    		@foreach ($profile->relTpCredential as $key => $credential)
    		<div class="uk-width-1-4@s">
    			<h6 class="uk-margin-small-bottom"><strong>{{ $credential->credential_type }}</strong></h6>
    			<img src="{{ asset('storage/upload/'.$credential->filename.'') }}" alt="{{ $credential->credential_type }}">
    		</div>
    		<div id="{{ $credential->filename }}" uk-modal>
			    <div class="uk-modal-dialog uk-modal-body">
			        <h2 class="uk-modal-title">{{ $credential->credential_type }}</h2>
			        <img src="{{ asset('storage/upload/'.$credential->filename.'') }}" alt="{{ $credential->credential_type }}">
			        <p class="uk-text-right">
			            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
			        </p>
			    </div>
			</div>
			@endforeach
    	</div>
    	@else
			{{ $empty }}
		@endif
    </div>
    <div class="uk-card-footer">
    	@if($profile->is_premium == 0)
        <a href="{{ route('tutors.premium', $profile->relUser->id) }}" class="uk-button uk-button-danger">Make premium</a>
        @endif
    	@if($profile->is_premium == 1)
        <a href="{{ route('tutors.general', $profile->relUser->id) }}" class="uk-button uk-button-danger">Remove premium</a>
        @endif
    </div>
</div>
@endsection