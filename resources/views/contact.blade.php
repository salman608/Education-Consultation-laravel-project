@extends('layouts.frontend')
@section('content')
<div class="blocks">
    <h5 class="title">{{ __('Contact Us') }}</h5>
    <div class="content">
        <form id="tutorRegisterForm" action="{{ route('contact.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="{{ __('Name') }}" required autocomplete="name" autofocus>
                <small id="name_help" class="form-text text-muted">@error('name') {{ $message }} @enderror</small>
            </div>
            <div class="form-group">
                <label for="email">{{ __('E-Mail Address') }}</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autocomplete="email" autofocus>
                <small id="email_help" class="form-text text-muted">@error('email') {{ $message }} @enderror</small>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="you_are">Select You Are</label>
                    {{ Form::select('you_are', ['Student' => 'Student', 'Parent' => 'Parent', 'Tutor' => 'Tutor'], old('you_are'), ['placeholder' => 'Select You Are', 'id' => 'you_are', 'class' => 'form-control '.($errors->has('you_are') ? 'is-invalid':'').'']) }}
                    <small id="you_are_help" class="form-text text-muted error_you_are">@error('you_are') {{ $message }} @enderror</small>
                </div>
                <div class="form-group col-md-6">
                    <label for="subject">Select Subject</label>
                    {{ Form::select('subject', ['I want to give a feedback' => 'I want to give a feedback', 'I have an issue' => 'I have an issue', 'I have an inquiry' => 'I have an inquiry', 'Others' => 'Others'], old('subject'), ['placeholder' => 'Select Subject', 'id' => 'subject', 'class' => 'form-control '.($errors->has('courses_id') ? 'is-invalid':'').'']) }}
                    <small id="subject_help" class="form-text text-muted error_subject">@error('subject') {{ $message }} @enderror</small>
                </div>
            </div>
            <div class="form-group">
                <div class="uk-inline uk-width-1-1">
                    <label for="message">Your Message Here...</label>
                    <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" rows="5" placeholder="{{ __('Your Message Here...') }}">{{ old('message') }}</textarea>
                </div>
                <small id="message_help" class="form-text text-muted error_message">@error('message') {{ $message }} @enderror</small>
            </div>
            <div class="uk-margin">
                <button type="submit" class="btn btn-success">{{ __('Send') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
