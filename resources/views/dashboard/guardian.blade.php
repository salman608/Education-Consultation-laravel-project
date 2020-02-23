@extends('layouts.backend')
@section('content')
<div class="uk-card uk-card-small">
    <!-- <div class="uk-card-header">
        <div class="uk-grid-small uk-flex-middle" uk-grid>
            <div class="uk-width-auto uk-position-relative">
                <img class="uk-border-circle uk-box-shadow-medium" width="80" height="80" src="{{ (!empty($profile->photo)) ? asset('storage/upload/'.$profile->photo.'') : asset('storage/upload/default-profile.png') }}">
                <a class="uk-border-circle uk-badge uk-position-absolute" href="{{ route('guardian.profile.upload_profile_photo') }}" style="top: 0; right: 0;"><span uk-icon="cloud-upload"></span></a>
            </div>
            <div class="uk-width-expand">
                <h3 class="uk-card-title uk-margin-remove-bottom uk-text-bold">{{ auth()->user()->name }} [ {{ auth()->user()->email }} ]</h3>
                <p class="uk-text-emphasis uk-margin-remove-top">Phone : {{ $profile->phone }}</p>
                <p class="uk-text-emphasis uk-margin-remove-top">Address : {{ $profile->address }}</p>
            </div>
        </div>
    </div> -->
	<div class="uk-card-body">
        <div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>
            <div>
                <div class="uk-card uk-card-primary uk-card-body">
                    <h3 class="uk-card-title">{{ $posted_jobs }}</h3>
                    <p class="uk-text-bold uk-text-emphasis">Number of post tutoring jobs</p>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-primary uk-card-body">
                    <h3 class="uk-card-title">{{ $contact_deal }}</h3>
                    <p class="uk-text-bold uk-text-emphasis">Contact detail of student</p>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-primary uk-card-body">
                    <h3 class="uk-card-title">{{ $profile->relUser->updated_at }}</h3>
                    <p class="uk-text-bold uk-text-emphasis">Last logged in</p>
                </div>
            </div>
        </div>
    </div>
    <div class="uk-card-body">
        <a class="uk-button uk-button-primary" href="{{ route('jobs.create') }}"><span uk-icon="plus-circle"></span> <strong class="button-text-hide">Post Another Tuition Jobs</strong></a>
    </div>
</div>
@endsection