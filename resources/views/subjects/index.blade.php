@extends('layouts.backend')
@section('content')
<div class="uk-card uk-card-body">
    <h3 class="uk-heading-divider uk-clearfix">
	    Subjects
	    <a class="uk-button uk-button-primary uk-float-right" href="{{ route('subjects.create') }}"><span uk-icon="plus-circle"></span> <strong class="button-text-hide">Create Subjects</strong></a>
	</h3>
	<table class="uk-table uk-table-middle uk-table-divider">
	    <thead>
	        <tr>
	            <th class="uk-table-expand">Category Name</th>
	            <th class="uk-table-expand">Course Name</th>
	            <th class="uk-table-expand">Subject Name</th>
	            <th class="uk-text-right">Action</th>
	        </tr>
	    </thead>
	    <tbody>
	    	@if(!empty($subjects))
	    	@foreach($subjects as $subject)
	        <tr>
	            <td class="uk-text-emphasis">{{ $subject->relCourse->relCategories->name }}</td>
	            <td class="uk-text-emphasis">{{ $subject->relCourse->name }}</td>
	            <td class="uk-text-emphasis">{{ $subject->name }}</td>
	            <td class="uk-text-right">
					<a href="{{ route('subjects.edit', $subject->id) }}" class="uk-icon-link uk-margin-small-right" uk-icon="file-edit"></a>
	            </td>
	        </tr>
	        @endforeach
	        @endif
	    </tbody>
	</table>
</div>
@endsection