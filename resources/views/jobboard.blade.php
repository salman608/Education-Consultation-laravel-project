@extends('layouts.frontend')
@section('content')
<div class="blocks">
    <h5 class="title">{{ __('Available Tuitions') }}</h5>
    <div class="content">
        <form id="jobSearchForm" class="jobsearch" action="javaScript:;">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::select('city_id', $cities, null, ['placeholder' => 'Select City', 'id' => 'city_id', 'class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::select('locations_id[]', [], null, ['id' => 'locations_id', 'class' => 'form-control', 'multiple' => 'multiple']) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::select('categories_id[]', $categories, null, ['id' => 'categories_id', 'class' => 'form-control', 'multiple' => 'multiple']) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::select('courses_id', [], null, ['id' => 'courses_id', 'class' => 'form-control', 'multiple' => 'multiple']) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::select('gender[]', ['Male' => 'Male', 'Female' => 'Female'], null, ['id' => 'gender', 'class' => 'form-control', 'multiple' => 'multiple']) }}
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="available-tuitions" id="available-tuitions"></div>

<form id="ajaxLoginModal" class="modal" tabindex="-1" role="dialog" action="javaScript:;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Sign In') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autocomplete="email" autofocus>
                    <small id="email_help" class="form-text text-muted">@error('email') {{ $message }} @enderror</small>
                </div>
                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">
                    <small id="password_help" class="form-text text-muted">@error('password') {{ $message }} @enderror</small>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-success btn-sm mr-auto" href="{{ route('register.tutor') }}">{{ __('Tutor Registration') }}</a>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">{{ __('Login') }}</button>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
var serialize = null;
function getJobBoard( serialize )
{
    axios.post('{{ route("public.get_jobs") }}', serialize)
    .then(function (response) {
        console.log(response);
        $('#available-tuitions').html(response.data);
    })
    .catch(function (error) {
        console.log(error.response);
    });
}

$(document).ready(function(){
    var g = $('#jobSearchForm').serialize();
    getJobBoard( g );
    $('#city_id').select2({
        placeholder: "Select City"
    });
    $('#locations_id').select2({
        maximumSelectionLength: 5,
        placeholder: "Select Location"
    });
    $("#city_id").change(function(){
        var city_id = $(this).val();
        var initsellocation = '<option value="">Select Location</option>';
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
        var g = $('#jobSearchForm').serialize();
        getJobBoard( g );
    });
    $('#categories_id').select2({
        maximumSelectionLength: 5,
        placeholder: "Select categories",
    });
    $('#courses_id').select2({
        placeholder: "Select class / course(s)"
    });
    $('#gender').select2({
        placeholder: "Select gender",
    });

    $("#categories_id").change(function(){
        var categories_id = $(this).val();
        $('#courses_id').select2({
            placeholder: "Select class / course(s)"
        }).empty().trigger('change');
        if (categories_id != "") {
            axios.get('{{ route("get_cources_with_group") }}/'+categories_id)
            .then(function (response) {
                $('#courses_id').select2({
                    data: response.data,
                    placeholder: "Select class / course(s)"
                });
            })
            .catch(function (error) {
                console.log(error);
            });
        }
        var g = $('#jobSearchForm').serialize();
        getJobBoard( g );
    });
});
$(document).on('change', '#gender', function(){
    var g = $('#jobSearchForm').serialize();
    getJobBoard( g );
});

$(document).on('change', '#locations_id', function(){
    var g = $('#jobSearchForm').serialize();
    getJobBoard( g );
});

$(document).on('change', '#courses_id', function(){
    var g = $('#jobSearchForm').serialize();
    getJobBoard( g );
});


$(document).on('click', 'button[name="apply"]', function(){
    axios.get($(this).parent('form').attr('action'))
    .then(function (response) {
        toastr.success(response.data.success);
    })
    .catch(function (error) {
        console.log(error.response)
        if (error.response.status == '400') {
            if (error.response.data.error != null) {
            toastr.error(error.response.data.error);
            }
        }
        else
        {
            $('#ajaxLoginModal').modal('show')
        }
    });
});

$("#ajaxLoginModal").submit(function() {
    axios.post('{{ route("login_tutor") }}', $(this).serialize())
    .then(function (response) {
        console.log(response)
        $(".form-text.text-muted").html("&nbsp;");
        toastr.success(response.data.success);
        $('#ajaxLoginModal').modal('hide')
    })
    .catch(function (error) {
        console.log(error.response)
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
</script>
@endsection