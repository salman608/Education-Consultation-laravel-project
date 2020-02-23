@extends('layouts.backend')
@section('content')
<div class="uk-card uk-card-body">
    <h3 class="uk-heading-divider uk-clearfix">Tuition Jobs</h3>
	<table class="uk-table uk-table-middle uk-table-divider uk-table-small">
	    <thead>
	        <tr>
	            <th class="uk-width-small">Tution ID</th>
	            <th class="uk-table-expand">Tution Name</th>
	            <th class="uk-width-small">Status</th>
	            <th class="uk-table-expand uk-width-small">Applied Tutor's</th>
	            <th class="uk-width-small uk-text-right">Action</th>
	        </tr>
	    </thead>
	    <tbody>
	    	@if(!empty($jobs))
	    	@foreach($jobs as $job)
	        <tr>
	            <td class="uk-text-emphasis">{{ (empty($job->job_id)) ? $job->id : $job->job_id }}</td>
	            <td class="uk-text-emphasis">
	                <p class="uk-margin-remove uk-text-bold">Need a tutor for {{ $job->relCourse->name }}</p>
	                <p class="uk-margin-remove uk-text-bold">Guardian Phone : {{ $job->relGuardianProfile->phone }}</p>
	                <p class="uk-margin-remove uk-text-bold">Location : {{ $job->relCity->name }}, {{ $job->relLocation->name }}</p>
	                <p class="uk-margin-remove uk-text-bold"><small>Posted On : {{ $job->created_at }}</small></p>
	           </td>
	            <td class="uk-text-emphasis uk-text-capitalize">{{ $job->is_published }}</td>
	            <td class="uk-text-emphasis uk-text-capitalize uk-text-center"><span class="uk-badge">{{ count($job->relAppliedJobs) }}</span></td>
	            <td class="uk-text-right">
					<a href="{{ route('jobs.show', $job->id) }}" class="uk-icon-link uk-margin-small-right" uk-icon="info"></a>
					@if(in_array($job->is_published, ['reviewing', 'published']))
					<a href="{{ route('jobs.edit', $job->id) }}" class="uk-icon-link uk-margin-small-right" uk-icon="pencil"></a>
					@endif
	            </td>
	        </tr>
	        @endforeach
	        @endif
	    </tbody>
	</table>
</div>
@endsection