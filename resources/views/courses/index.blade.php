@extends('layouts.backend')
@section('content')
<div class="uk-card uk-card-body">
    <h3 class="uk-heading-divider uk-clearfix">
	    Courses
	    <a class="uk-button uk-button-primary uk-float-right" href="{{ route('courses.create') }}"><span uk-icon="plus-circle"></span> <strong class="button-text-hide">Create Courses</strong></a>
	</h3>
	<table class="uk-table uk-table-middle uk-table-divider">
	    <thead>
	        <tr>
	            <th class="uk-table-expand">Category Name</th>
	            <th class="uk-table-expand">Course Name</th>
	            <th class="uk-text-right">Action</th>
	        </tr>
	    </thead>
	    <tbody>
	    	@if(!empty($courses))
	    	@foreach($courses as $course)
	        <tr>
	            <td class="uk-text-emphasis">{{ $course->relCategories->name }}</td>
	            <td class="uk-text-emphasis">{{ $course->name }}</td>
	            <td class="uk-text-right">
					<a href="{{ route('courses.edit', $course->id) }}" class="uk-icon-link uk-margin-small-right" uk-icon="file-edit"></a>
	            </td>
	        </tr>
	        @endforeach
	        @endif
	    </tbody>
	</table>
</div>
@endsection