@extends('layouts.frontend')
@section('content')
<div class="blocks">
    <h5 class="title">{{ __('Tutor Sign Up') }}</h5>
    <div class="content">
        <form id="tutorRegisterForm" action="javaScript:;">
            @csrf
            <div class="form-group">
                <label for="name">{{ __('Name') }} <span class="text-danger">(Requied *)</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="{{ __('Name') }}">
                <p id="name_help" class="form-text text-muted error_name">@error('name') {{ $message }} @enderror</p>
            </div>
            <div class="form-group">
                <label for="email">{{ __('Email Address') }} <span class="text-danger">(Requied *)</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="{{ __('Email Address') }}">
                <p id="email_help" class="form-text text-muted error_email">@error('email') {{ $message }} @enderror</p>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="phone">{{ __('Phone Number') }} <span class="text-danger">(Requied *)</span></label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="{{ __('Phone Number') }}">
                    <p id="phone_help" class="form-text text-muted error_phone">@error('phone') {{ $message }} @enderror</p>
                </div>
                <div class="form-group col-md-4">
                    <label for="parents_type">{{ __('Parents Type') }} <span class="text-danger">(Requied *)</span></label>
                    {{ Form::select('parents_type', ['father' => 'Father', 'mother' => 'Mother'], NULL, ['placeholder' => 'Select Parents Type', 'id' => 'parents_type', 'class' => 'form-control']) }}
                    <p id="parents_type_help" class="form-text text-muted error_parents_type">@error('parents_type') {{ $message }} @enderror</p>
                </div>
                <div class="form-group col-md-4">
                    <label for="parents_mobile_no">{{ __('Parents Phone Number') }} <span class="text-danger">(Requied *)</span></label>
                    <input type="text" class="form-control @error('parents_mobile_no') is-invalid @enderror" id="parents_mobile_no" name="parents_mobile_no" value="{{ old('parents_mobile_no') }}" placeholder="{{ __('Parents Phone Number') }}">
                    <p id="parents_mobile_no_help" class="form-text text-muted error_parents_mobile_no">@error('parents_mobile_no') {{ $message }} @enderror</p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city_id">{{ __('City') }} <span class="text-danger">(Requied *)</span></label>
                    {{ Form::select('city_id', (!empty($cities)) ? $cities : [], NULL, ['placeholder' => 'Select City', 'id' => 'city_id', 'class' => 'form-control']) }}
                    <p id="city_id_help" class="form-text text-muted error_city_id">@error('city_id') {{ $message }} @enderror</p>
                </div>
                <div class="form-group col-md-6">
                    <label for="locations_id">{{ __('Your location') }} <span class="text-danger">(Requied *)</span></label>
                    {{ Form::select('locations_id', [], NULL, ['placeholder' => 'Select Location', 'id' => 'locations_id', 'class' => 'form-control']) }}
                    <p id="locations_id_help" class="form-text text-muted error_locations_id">@error('locations_id') {{ $message }} @enderror</p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="institute_name">{{ __('Institute Name ( University/Collage ) ') }} <span class="text-danger">(Requied *)</span></label>
                    <input type="text" class="form-control @error('institute_name') is-invalid @enderror" id="institute_name" name="institute_name" value="{{ old('institute_name') }}" placeholder="{{ __('Institute Name') }}">
                    <p id="institute_name_help" class="form-text text-muted error_institute_name">@error('institute_name') {{ $message }} @enderror</p>
                </div>
                <div class="form-group col-md-3">
                    <label for="subject">{{ __('Subject') }} <span class="text-danger">(Requied *)</span></label>
                    <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject') }}" placeholder="{{ __('Subject') }}">
                    <p id="subject_help" class="form-text text-muted error_subject">@error('subject') {{ $message }} @enderror</p>
                </div>
                <div class="form-group col-md-3">
                    <label for="current_year">{{ __('Current Year') }} <span class="text-danger">(Requied *)</span></label>
                    {{ Form::select('current_year', ['1st Year' => '1st Year', '2nd Year' => '2nd Year', '3rd Year' => '3rd Year', 'Final Year' => 'Final Year', 'Completed' => 'Completed'], old('current_year'), ['placeholder' => 'Select Current Year', 'id' => 'current_year', 'class' => 'form-control']) }}
                    <p id="current_year_help" class="form-text text-muted error_current_year">@error('current_year') {{ $message }} @enderror</p>
                </div>
            </div>
            <div class="form-group">
                <label for="facebook_link">{{ __('Facebook Profile Link/Name') }} </label>
                <input type="text" class="form-control @error('facebook_link') is-invalid @enderror" id="facebook_link" name="facebook_link" value="{{ old('facebook_link') }}" placeholder="{{ __('ex: https://www.facebook.com/your_profile_name') }}">
                <p id="facebook_link_help" class="form-text text-muted error_facebook_link">@error('facebook_link') {{ $message }} @enderror</p>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="password">{{ __('Password') }} <span class="text-danger">(Requied *)</span></label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="{{ __('Password') }}">
                    <p class="text-danger">Your password must be 8 characters long</p>
                    <p id="password_help" class="form-text text-muted error_password">@error('password') {{ $message }} @enderror</p>
                </div>
                <div class="form-group col-md-6">
                    <label for="password_confirmation">{{ __('Retype Password') }} <span class="text-danger">(Requied *)</span></label>
                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="{{ __('Retype Password') }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Sign Up') }}</button>
            <p class="mt-2">By Signing up, you agree to our <a href="{{ route('conditions') }}">Terms of Use and Privacy Policy</a></p>
        </form>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("#city_id").change(function(){
        var city_id = $(this).val();
        var initsellocation = '<option selected="selected" value="">Select Location</option>';
        $("#locations_id").html(initsellocation);
        
        if (city_id != "") {
            axios.get('{{ route("get_locations") }}/'+city_id)
            .then(function (response) {
                var opt = [];
                opt.push(initsellocation);
                $.each(response.data, function (key, value) {
                    opt.push('<option value="' + key + '">' + value + '</option>');
                });
                $("#locations_id").html(opt);
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    });
    $("#tutorRegisterForm").submit(function() {
        axios.post('{{ route("register.tutor") }}', $(this).serialize())
        .then(function (response) {
            console.log(response);
            $(".form-text.text-muted").html("&nbsp;");
            toastr.success(response.data.success);
            window.location.href = '{{ route("login") }}';
        })
        .catch(function (error) {
            console.log(error.response);
            $(".form-text.text-muted").html("&nbsp;");
            $.each(error.response.data.errors, function(index, value){
                $(".error_" + index + "").html(value[0]);
            });
            if (error.response.data.errors != null) {
            toastr.error(error.response.data.message);
            }
            if (error.response.data.error != null) {
            toastr.error(error.response.data.error);
            }
        });
    });
})
</script>
@endsection
