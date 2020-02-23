@extends('layouts.backend')
@section('content')
<div class="uk-card uk-card-body">
    <h3 class="uk-heading-divider uk-clearfix">
	    Tuition Jobs
	    <a class="uk-button uk-button-primary uk-float-right" href="{{ route('jobs.create') }}"><span uk-icon="plus-circle"></span> <strong class="button-text-hide">Post Another Tuition Jobs</strong></a>
	</h3>
	<table class="uk-table uk-table-middle uk-table-divider">
	    <thead>
	        <tr>
	            <th class="uk-width-small">SL</th>
	            <th class="uk-table-expand">Job Name</th>
	            <th class="uk-table-expand uk-width-small">Posted On</th>
	            <th class="uk-table-expand">Status</th>
	            <th class="uk-table-expand uk-text-right">Action</th>
	        </tr>
	    </thead>
	    <tbody>
	    	@if(!empty($jobs))
	    	@foreach($jobs as $key => $job)
	        <tr>
	            <td class="uk-text-emphasis">{{ ($key + 1) }}</td>
	            <td class="uk-text-emphasis">Need a tutor for {{ $job->relCourse->name }}</td>
	            <td class="uk-text-emphasis uk-text-truncate">{{ $job->created_at }}</td>
	            <td class="uk-text-emphasis uk-text-capitalize">{{ $job->is_published }}</td>
	            <td class="uk-text-right">
					<a href="{{ route('jobs.show', $job->id) }}" class="uk-icon-link uk-margin-small-right" uk-icon="info"></a>
	            </td>
	        </tr>
	        @endforeach
	        @endif
	    </tbody>
	</table>
</div>
@endsection