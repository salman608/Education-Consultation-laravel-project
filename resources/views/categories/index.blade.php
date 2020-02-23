@extends('layouts.backend')
@section('content')
<div class="uk-card uk-card-body">
    <h3 class="uk-heading-divider uk-clearfix">
	    Categories
	    <a class="uk-button uk-button-primary uk-float-right" href="{{ route('categories.create') }}"><span uk-icon="plus-circle"></span> <strong class="button-text-hide">Create Categories</strong></a>
	</h3>
	<table class="uk-table uk-table-middle uk-table-divider">
	    <thead>
	        <tr>
	            <th class="uk-table-expand">Category Name</th>
	            <th class="uk-text-right">Action</th>
	        </tr>
	    </thead>
	    <tbody>
	    	@if(!empty($categories))
	    	@foreach($categories as $category)
	        <tr>
	            <td class="uk-text-emphasis">{{ $category->name }}</td>
	            <td class="uk-text-right">
					<a href="{{ route('categories.edit', $category->id) }}" class="uk-icon-link uk-margin-small-right" uk-icon="file-edit"></a>
	            </td>
	        </tr>
	        @endforeach
	        @endif
	    </tbody>
	</table>
</div>
@endsection