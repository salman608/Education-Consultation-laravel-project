@extends('layouts.backend')
@section('content')
<div class="uk-card uk-card-small">
	<div class="uk-card-body">
        <div class="uk-child-width-1-2@m uk-grid-small uk-grid-match" uk-grid>
            <div>
                <div class="uk-card uk-card-primary uk-card-body">
                    <h3 class="uk-card-title">{{ $total_applied_job }}</h3>
                    <p class="uk-text-bold uk-text-emphasis">Number of applied jobs</p>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-primary uk-card-body">
                    <h3 class="uk-card-title">{{ $total_completed_job }}</h3>
                    <p class="uk-text-bold uk-text-emphasis">Approved tuition jobs</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
