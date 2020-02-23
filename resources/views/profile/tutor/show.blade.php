@extends('layouts.backend')
@section('content')

<div class="uk-card uk-card-body uk-card-small">
    <div class="uk-card-header uk-card-primary">
        <div class="uk-grid-small uk-flex-middle header_profile" uk-grid>
            <div class="uk-width-auto">
                <img class="uk-border-circle uk-box-shadow-medium" width="100" height="100" src="{{ (!empty($profile->photo)) ? asset('storage/upload/'.$profile->photo.'') : asset('storage/upload/default-profile.png') }}">
            </div>
            <div class="uk-width-expand">
                <h5 class="uk-card-title uk-margin-remove-bottom uk-text-bold">{{ auth()->user()->name }}</h5>
                <p class="uk-margin-remove-top uk-text-bold uk-text-emphasis">Profile Completed: {{ $percentage }}%</p>
            </div>
        </div>
    </div>
    <!-- <div class="uk-card-body">
    	<a class="uk-button uk-button-primary uk-float-right" href="{{ route('tutor.profile.generate_cv') }}">Download CV</a>
    </div> -->
    <div class="uk-card-header uk-card-primary uk-text-bold">Personal Information</div>
    <div class="uk-card-body">
		<div class="uk-grid-small" uk-grid>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your E-mail</dt>
				    <dd class="uk-text-bold">{{ $profile->relUser->email }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Gender</dt>
				    <dd class="uk-text-bold">{{ (!empty($profile->gender)) ? $profile->gender : $empty }}<span class="uk-text-danger">&nbsp;{{ (empty($profile->gender)) ? $mustbe  : '' }}</span></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Contact Number</dt>
				    <dd class="uk-text-bold">{{ $profile->phone }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-1@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Address</dt>
				    <dd class="uk-text-bold">{{ (!empty($profile->address)) ? $profile->address : $empty }}<span class="uk-text-danger">&nbsp;{{ (empty($profile->address)) ? $mustbe  : '' }}</span></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-1@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Birth Certificate No</dt>
				    <dd class="uk-text-bold">{{ (!empty($profile->identity)) ? $profile->identity : $empty }}<span class="uk-text-danger">&nbsp;{{ (empty($profile->identity)) ? $mustbe  : '' }}</span></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Facebook ID</dt>
				    <dd class="uk-text-bold"><a href="{{ $profile->facebook_link }}">{{ (!empty($profile->facebook_link)) ? $profile->facebook_link : $empty }}</a></dd>
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
				    <dd class="uk-text-bold">{{ (!empty($profile->father_name)) ? $profile->father_name : $empty }}<span class="uk-text-danger">&nbsp;{{ (empty($profile->father_name)) ? $mustbe  : '' }}</span></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Father Mobile No.</dt>
				    <dd class="uk-text-bold">{{ (!empty($profile->father_mobile_no)) ? $profile->father_mobile_no : $empty }}<span class="uk-text-danger">&nbsp;{{ (empty($profile->father_mobile_no)) ? $mustbe  : '' }}</span></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Mother Name</dt>
				    <dd class="uk-text-bold">{{ (!empty($profile->mother_name)) ? $profile->mother_name : $empty }}<span class="uk-text-danger">&nbsp;{{ (empty($profile->mother_name)) ? $mustbe  : '' }}</span></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Mother Mobile No.</dt>
				    <dd class="uk-text-bold">{{ (!empty($profile->mother_mobile_no)) ? $profile->mother_mobile_no : $empty }}<span class="uk-text-danger">&nbsp;{{ (empty($profile->mother_mobile_no)) ? $mustbe  : '' }}</span></dd>
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
				    <dd class="uk-text-bold">{{ (!empty($profile->emergency_name)) ? $profile->emergency_name : $empty }}<span class="uk-text-danger">&nbsp;{{ (empty($profile->emergency_name)) ? $mustbe  : '' }}</span></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-1@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Emergency Contact Address</dt>
				    <dd class="uk-text-bold">{{ (!empty($profile->emergency_address)) ? $profile->emergency_address : $empty }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Contact No.</dt>
				    <dd class="uk-text-bold">{{ (!empty($profile->emergency_mobile_no)) ? $profile->emergency_mobile_no : $empty }}<span class="uk-text-danger">&nbsp;{{ (empty($profile->emergency_mobile_no)) ? $mustbe  : '' }}</span></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Relation</dt>
				    <dd class="uk-text-bold">{{ (!empty($profile->emergency_relation)) ? $profile->emergency_relation : $empty }}<span class="uk-text-danger">&nbsp;{{ (empty($profile->emergency_relation)) ? $mustbe  : '' }}</span></dd>
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
			<span class="uk-text-danger">&nbsp;{{ (count($profile->relTpCategories) == 0) ? $mustbe  : '' }}</span>
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
			<span class="uk-text-danger">&nbsp;{{ (count($profile_courses_subjects) == 0) ? $mustbe  : '' }}</span>
		</div>
		<p class="uk-text-primary uk-text-bold">Your Selected Location Info</p>
		<div class="uk-grid-small" uk-grid>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your City</dt>
				    <dd class="uk-text-bold">{{ (!empty($profile->relCity->name)) ? $profile->relCity->name : $empty }}<span class="uk-text-danger">&nbsp;{{ (empty($profile->relCity->name)) ? $mustbe  : '' }}</span></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Location</dt>
				    <dd class="uk-text-bold">{{ (!empty($profile->relLocation->name)) ? $profile->relLocation->name : $empty }}<span class="uk-text-danger">&nbsp;{{ (empty($profile->relLocation->name)) ? $mustbe  : '' }}</span></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-1@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Preferred Location</dt>
				    <dd class="uk-text-bold">
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
						<span class="uk-text-danger">&nbsp;{{ (count($profile->relTpPreferredLocations) == 0) ? $mustbe  : '' }}</span>
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
			<span class="uk-text-danger">&nbsp;{{ (count($profile->relTpProvideService) == 0) ? $mustbe  : '' }}</span>
		</div>
		<p class="uk-text-primary uk-text-bold">Experience Info</p>
		<div class="uk-grid-small" uk-grid>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Do you have any tutoring experience?</dt>
				    <dd class="uk-text-bold">{{ (!empty($profile->have_experience)) ? $profile->have_experience : $empty }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your total experience?</dt>
				    <dd class="uk-text-bold">{{ (!empty($profile->experience)) ? $profile->experience : $empty }}</dd>
				</dl>
		    </div>
		</div>
		<p class="uk-text-primary uk-text-bold">Availability / Salary</p>
		<div class="uk-grid-small" uk-grid>
		    <div class="uk-width-1-1@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Available Days</dt>
				    <dd class="uk-text-bold">
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
				    <dd class="uk-text-bold">{{ (!empty($profile->from_time)) ? $profile->from_time : $empty }}<span class="uk-text-danger">&nbsp;{{ (empty($profile->from_time)) ? $mustbe  : '' }}</span></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Available To</dt>
				    <dd class="uk-text-bold">{{ (!empty($profile->to_time)) ? $profile->to_time : $empty }}<span class="uk-text-danger">&nbsp;{{ (empty($profile->from_time)) ? $mustbe  : '' }}</span></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>You Expected Salary (BDT)</dt>
				    <dd class="uk-text-bold">{{ (!empty($profile->salary)) ? $profile->salary : $empty }} Tk<span class="uk-text-danger">&nbsp;{{ (empty($profile->salary)) ? $mustbe  : '' }}</span></dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Your Tuition Style</dt>
				    <dd class="uk-text-bold">
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
						<span class="uk-text-danger">&nbsp;{{ (count($profile->relTpTutoringStyle) == 0) ? $mustbe  : '' }}</span>
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
					    <dd class="uk-text-bold">{{ $loop->level_of_education }}</dd>
					</dl>
			    </div>
			    <div class="uk-width-1-3@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>Exam / Degree</dt>
					    <dd class="uk-text-bold">{{ $loop->degree_title }}</dd>
					</dl>
			    </div>
			    <div class="uk-width-1-3@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>Concentration / Major / Group</dt>
					    <dd class="uk-text-bold">{{ $loop->group_name }}</dd>
					</dl>
			    </div>
			    <div class="uk-width-1-1@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>Institute Name</dt>
					    <dd class="uk-text-bold">{{ $loop->institute_name }}</dd>
					</dl>
			    </div>
			    <div class="uk-width-1-3@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>GPA / CGPA</dt>
					    <dd class="uk-text-bold">{{ $loop->result }}</dd>
					</dl>
			    </div>
			    <div class="uk-width-1-3@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>Year of passing</dt>
					    <dd class="uk-text-bold">{{ $loop->year_of_passing }}</dd>
					</dl>
			    </div>
			    <div class="uk-width-1-3@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>Curriculum</dt>
					    <dd class="uk-text-bold">{{ $loop->curriculum }}</dd>
					</dl>
			    </div>
			    <div class="uk-width-1-3@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>From Date</dt>
					    <dd class="uk-text-bold">{{ db2date($loop->from_date) }}</dd>
					</dl>
			    </div>
			    <div class="uk-width-1-2@s">
			    	<dl class="uk-description-list uk-description-list-divider">
					    <dt>Until Date</dt>
			    		@if($loop->is_until == 'true')
					    <dd class="uk-text-bold">I'm currently studying here</dd>
			    		@endif
			    		@if($loop->is_until == 'false')
					    <dd class="uk-text-bold">{{ db2date($loop->until_date) }}</dd>
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
    <div class="uk-card-header uk-card-primary uk-text-bold">Tutor Documents</div>
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
		<span class="uk-text-danger">&nbsp;{{ (count($profile->relTpCredential) == 0) ? $mustbe  : '' }}</span>
    </div>
</div>
@endsection