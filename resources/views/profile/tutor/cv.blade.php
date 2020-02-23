<div style="text-align: center;">
	<img style="width: 200px; margin: 0 auto; display: block;" src="{{ asset('assets/images/tutor-provide.png') }}">
</div>
<p style="text-align: center; padding: 5px 0; font-size: 20px; background-color: #0088ff; font-weight: bold; color: #fff">CV of {{ $profile->relUser->name }}</p>
<table>
	<tr>
		<th>Tutor ID</th>
		<td>{{ $profile->relUser->id }}</td>
		<td colspan="2" rowspan="4" style="text-align: right;">
			@if(!empty($profile->photo))
			<img style="width: 100px;" src="{{ asset('storage/upload/'.$profile->photo.'') }}">
			@else
			<img style="width: 100px;" src="{{ asset('storage/upload/default-profile.png') }}">
			@endif
		</td>
	</tr>
	<tr>
		<th>Name</th>
		<td>{{ $profile->relUser->name }}</td>
	</tr>
	<tr>
		<th>Contact No</th>
		<td>{{ $profile->phone }}</td>
	</tr>
	<tr>
		<th>E-mail</th>
		<td>{{ $profile->relUser->email }}</td>
	</tr>
	<tr>
		<th>Address</th>
		<td>{{ (!empty($profile->address)) ? $profile->address : $empty }}</td>
		<th>Member Since</th>
		<td>{{ db2date($profile->relUser->created_at) }}</td>
	</tr>
</table>
<p style="text-align: left; padding: 5px; font-size: 18px; background-color: #525659; font-weight: bold; color: #fff">Personal Info</p>
<table>
	<tr>
		<th>Fathers Name</th>
		<td>{{ (!empty($profile->father_name)) ? $profile->father_name : $empty }}</td>
	</tr>
	<tr>
		<th>Fathers Phone</th>
		<td>{{ (!empty($profile->father_mobile_no)) ? $profile->father_mobile_no : $empty }}</td>
	</tr>
	<tr>
		<th>Mothers Name</th>
		<td>{{ (!empty($profile->mother_name)) ? $profile->mother_name : $empty }}</td>
	</tr>
	<tr>
		<th>Mothers Phone</th>
		<td>{{ (!empty($profile->mother_mobile_no)) ? $profile->mother_mobile_no : $empty }}</td>
	</tr>
	<tr>
		<th>Gender</th>
		<td>{{ (!empty($profile->gender)) ? $profile->gender : $empty }}</td>
	</tr>
	<tr>
		<th>Detail Address</th>
		<td>{{ (!empty($profile->address)) ? $profile->address : $empty }}</td>
	</tr>
	<tr>
		<th>Birth Certificate No</th>
		<td>{{ (!empty($profile->identity)) ? $profile->identity : $empty }}</td>
	</tr>
	<tr>
		<th>Emergency Contact Name</th>
		<td>{{ (!empty($profile->emergency_name)) ? $profile->emergency_name : $empty }}</td>
	</tr>
	<tr>
		<th>Emergency Contact Address</th>
		<td>{{ (!empty($profile->emergency_address)) ? $profile->emergency_address : $empty }}</td>
	</tr>
	<tr>
		<th>Emergency Contact No</th>
		<td>{{ (!empty($profile->emergency_mobile_no)) ? $profile->emergency_mobile_no : $empty }}</td>
	</tr>
	<tr>
		<th>Emergency Contact Relation</th>
		<td style="text-transform: capitalize;">{{ (!empty($profile->emergency_relation)) ? $profile->emergency_relation : $empty }}</td>
	</tr>
</table>
@if(count($profile->relTpEducational))
<p style="text-align: left; padding: 5px; font-size: 18px; background-color: #525659; font-weight: bold; color: #fff">Education Details</p>
@foreach($profile->relTpEducational as $education)
<table style="margin-bottom: 15px; border: 1px solid #0088ff">
	<tr>
		<td>
			<p style="text-transform: capitalize; font-weight: bold;">LEVEL OF EDUCATION</p>
			<p>{{ $education->level_of_education }}</p>
		</td>
		<td>
			<p style="text-transform: capitalize; font-weight: bold;">EXAM / DEGREE</p>
			<p>{{ $education->degree_title }}</p>
		</td>
		<td>
			<p style="text-transform: capitalize; font-weight: bold;">CONCENTRATION / MAJOR / GROUP</p>
			<p>{{ $education->group_name }}</p>
		</td>
	</tr>
	<tr>
		<td colspan="3">
			<p style="text-transform: capitalize; font-weight: bold;">INSTITUTE NAME</p>
			<p>{{ $education->institute_name }}</p>
		</td>
	</tr>
	<tr>
		<td>
			<p style="text-transform: capitalize; font-weight: bold;">GPA / CGPA</p>
			<p>{{ $education->result }}</p>
		</td>
		<td>
			<p style="text-transform: capitalize; font-weight: bold;">YEAR OF PASSING</p>
			<p>{{ $education->year_of_passing }}</p>
		</td>
		<td>
			<p style="text-transform: capitalize; font-weight: bold;">CURRICULUM</p>
			<p>{{ $education->curriculum }}</p>
		</td>
	</tr>
	<tr>
		<td>
			<p style="text-transform: capitalize; font-weight: bold;">FROM DATE</p>
			<p>{{ db2date($education->from_date) }}</p>
		</td>
		<td colspan="2">
			<p style="text-transform: capitalize; font-weight: bold;">UNTIL DATE</p>
			@if($education->is_until == 'true')
				<p>I'm currently studying here</p>
			@endif
			@if($education->is_until == 'false')
				<p>{{ db2date($education->until_date) }}</p>
			@endif
		</td>
	</tr>
</table>
@endforeach
@endif
<p style="text-align: left; padding: 5px; font-size: 18px; background-color: #525659; font-weight: bold; color: #fff">Tuition Related Info</p>
<table>
	<tr>
		<th>Available days</th>
		<td>
			@if(count($profile->relTpAvailability))
				@php
				$profile->relTpAvailability->map(function ($loop) {
				@endphp
				{{ $loop->day }},
		        @php
		    	});
				@endphp
			@else
				{{ $empty }}
			@endif
		</td>
	</tr>
	<tr>
		<th>Available time</th>
		<td>{{ (!empty($profile->from_time) && !empty($profile->to_time)) ? $profile->from_time .' to '.$profile->to_time : $empty }}</td>
	</tr>
	<tr>
		<th>Expected Minimum Fees</th>
		<td>{{ (!empty($profile->salary)) ? $profile->salary : $empty }} Tk</td>
	</tr>
	<tr>
		<th>Tutoring Categories</th>
		<td>
			@if(count($profile->relTpCategories))
				@php
				$profile->relTpCategories->map(function ($loop) {
				@endphp
				{{ $loop->relCategory->name }},
		        @php
		    	});
				@endphp
			@else
				{{ $empty }}
			@endif
		</td>
	</tr>
	<tr>
		<th>Preferable Classes and Subjects</th>
		<td>
			@if(count($profile_courses_subjects))
				@foreach ($profile_courses_subjects as $key => $course)
				<strong>{{ $key }} :</strong> {{ implode(", ", $course) }}
				@endforeach
			@else
				{{ $empty }}
			@endif
		</td>
	</tr>
	<tr>
		<th>City</th>
		<td>{{ (!empty($profile->relCity->name)) ? $profile->relCity->name : $empty }}</td>
	</tr>
	<tr>
		<th>Location</th>
		<td>{{ (!empty($profile->relLocation->name)) ? $profile->relLocation->name : $empty }}</td>
	</tr>
	<tr>
		<th>Preferred Locations</th>
		<td>
			@if(count($profile->relTpPreferredLocations))
				@php
				$profile->relTpPreferredLocations->map(function ($loop) {
				@endphp
				{{ $loop->relLocation->name }}
		        @php
		    	});
				@endphp
			@else
				{{ $empty }}
			@endif
		</td>
	</tr>
	<tr>
		<th>Preferred Tutoring Style</th>
		<td>
			@if(count($profile->relTpTutoringStyle))
				@php
				$profile->relTpTutoringStyle->map(function ($loop) {
				@endphp
				{{ $loop->name }},
		        @php
		    	});
				@endphp
			@else
				{{ $empty }}
			@endif
		</td>
	</tr>
	<tr>
		<th>Place of Tutoring</th>
		<td>
			@if(count($profile->relTpProvideService))
			@php
				$profile->relTpProvideService->map(function ($loop) {
				@endphp
				{{ $loop->name }},
		        @php
		    	});
				@endphp
			@else
				{{ $empty }}
			@endif
		</td>
	</tr>
	<tr>
		<th>Tutoring Experience</th>
		<td>{{ (!empty($profile->experience)) ? $profile->experience : $empty }}</td>
	</tr>
</table>