@extends('layouts.backend')
@section('content')
<div class="uk-card uk-card-body uk-card-small">
	<div class="uk-card-body">
	    <h3 class="uk-heading-divider uk-clearfix uk-margin-small-bottom">Need a {{ $job->relCategories->name }} - {{ $job->relCourse->name }} Tutor</h3>
	</div>
    <div class="uk-card-header uk-card-primary uk-text-bold">
    	Subjects :
    	@if(!empty($job->relJbSubject))
	    	@foreach($job->relJbSubject as $suject)
	    		{{ $suject->relSubject->name }},&nbsp;
	    	@endforeach
    	@endif
    </div>

    <div class="uk-card-header uk-card-primary uk-text-bold">Contact Info :</div>
    <div class="uk-card-body">
		<div class="uk-grid-small" uk-grid>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Name</dt>
				    <dd>{{ $job->relUser->name }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Email</dt>
				    <dd>{{ $job->relUser->email }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Phone</dt>
				    <dd>{{ $job->relGuardianProfile->phone }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Address</dt>
				    <dd>{{ $job->relGuardianProfile->address }}</dd>
				</dl>
		    </div>
		</div>
	</div>

    <div class="uk-card-header uk-card-primary uk-text-bold">Requirement details :</div>
    <div class="uk-card-body">
		<div class="uk-grid-small" uk-grid>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Category</dt>
				    <dd>{{ $job->relCategories->name }} @if(!empty($job->curriculum))<strong>Curriculum : </strong> {{ $job->curriculum }} @endif</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Class</dt>
				    <dd>{{ $job->relCourse->name }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Preferred gender</dt>
				    <dd class="uk-text-capitalize">{{ $job->peferred_gender }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Weekly</dt>
				    <dd>{{ $job->weekly }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Salary</dt>
				    <dd>{{ (!empty($job->salary)) ? $job->salary.' Tk' : 'Negotiate' }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Hire Date</dt>
				    <dd>{{ db2date($job->hire_date) }}</dd>
				</dl>
		    </div>
		    <div class="uk-width-1-2@s">
		    	<dl class="uk-description-list uk-description-list-divider">
				    <dt>Description</dt>
				    <dd>{{ $job->requirements }}</dd>
				</dl>
		    </div>
		</div>
	</div>
</div>
@endsection