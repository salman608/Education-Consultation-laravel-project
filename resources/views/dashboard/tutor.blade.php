@extends('layouts.backend')
@section('content')
<div class="uk-card uk-card-body uk-card-small">
	<div class="uk-card-header uk-card-primary">
		{{auth()->user()->relTutorsProfile->gender}}
		<form id="jobSearchForm" class="jobsearch" action="javaScript:;">
			@csrf
			<div class="uk-grid-small" uk-grid>
			    <div class="uk-width-1-4@s">
			    	{{ Form::select('city_id', $cities, null, ['placeholder' => 'Select City', 'id' => 'city_id', 'class' => 'uk-select']) }}
			    </div>
			    <div class="uk-width-1-4@s">
			    	{{ Form::select('locations_id[]', [], null, ['id' => 'locations_id', 'class' => 'uk-select', 'multiple' => 'multiple']) }}
			    </div>
			    <div class="uk-width-1-4@s">
			    	{{ Form::select('categories_id[]', $categories, null, ['id' => 'categories_id', 'class' => 'uk-select', 'multiple' => 'multiple']) }}
			    </div>
			    <div class="uk-width-1-4@s">
			    	{{ Form::select('courses_id', [], null, ['id' => 'courses_id', 'class' => 'uk-select', 'multiple' => 'multiple']) }}
			    </div>
			    <div class="uk-width-1-4@s" style="display: none;">
			    	{{ Form::select('gender[]', ['Male' => 'Male', 'Female' => 'Female', 'Any' => 'Any'], ['Any', auth()->user()->relTutorsProfile->gender], ['id' => 'gender', 'class' => 'uk-select', 'multiple' => 'multiple']) }}
			    </div>
			</div>
		</form>
	</div>
	<div class="uk-margin-small-top" id="available-tuitions">
    </div>
</div>
<script type="text/javascript">
var serialize = null;
function getJobBoard( serialize )
{
    axios.post('{{ route("private.get_jobs") }}', serialize)
    .then(function (response) {
        console.log(response);
        $('#available-tuitions').html(response.data);
    })
    .catch(function (error) {
        console.log(error);
    });
}
$(document).ready(function(){
	var g = $('#jobSearchForm').serialize();
    getJobBoard( g );
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

	swal({
	  title: 'Are you sure?',
	  text: "You want to Apply this!",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonText: 'Yes, delete it!',
	  cancelButtonText: 'No, cancel!',
	  reverseButtons: true
	});
    axios.get($(this).parent('form').attr('action'))
    .then(function (response) {
        console.log(response);
        // toastr.success(response.data.success);

      // swal("Good job!", "Apply Completed!", "success")


    })
    .catch(function (error) {
        console.log(error.response);
        toastr.error(error.response.data.error);
				swal("Good job!", "You are alredy applied", "error");


    });
});

</script>
@endsection
