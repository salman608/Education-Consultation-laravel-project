@extends('layouts.backend')
@section('content')
<div class="uk-card uk-card-body">
    <h3 class="uk-heading-divider uk-clearfix">
	    Cities
	    <a class="uk-button uk-button-primary uk-float-right" href="{{ route('cities.create') }}"><span uk-icon="plus-circle"></span> <strong class="button-text-hide">Create Cities</strong></a>
	</h3>
	<table class="uk-table uk-table-middle uk-table-divider">
	    <thead>
	        <tr>
	            <th class="uk-table-expand">City Name</th>
	            <th class="uk-text-right">Action</th>
	        </tr>
	    </thead>
	    <tbody>
	    	@if(!empty($cities))
	    	@foreach($cities as $city)
	        <tr>
	            <td class="uk-text-emphasis">{{ $city->name }}</td>
	            <td class="uk-text-right">
					<a href="{{ route('cities.edit', $city->id) }}" class="uk-icon-link uk-margin-small-right" uk-icon="file-edit"></a>
	            </td>
	        </tr>
	        @endforeach
	        @endif
	    </tbody>
	</table>
</div>
@endsection