@extends('layouts.backend')
@section('content')
<div class="uk-card uk-card-body">
    <h3 class="uk-heading-divider uk-clearfix">Profile</h3>
	<dl class="uk-description-list uk-description-list-divider">
	    <dt>Full name</dt>
	    <dd>{{ auth()->user()->name }}</dd>
	</dl>
	<dl class="uk-description-list uk-description-list-divider">
	    <dt>E-mail ID</dt>
	    <dd>{{ auth()->user()->email }}</dd>
	</dl>
	<dl class="uk-description-list uk-description-list-divider">
	    <dt>Mobile No.</dt>
	    <dd>{{ auth()->user()->relGuardianProfile->phone }}</dd>
	</dl>
</div>
@endsection
