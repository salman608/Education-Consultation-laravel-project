$(document).ready(function(){
    toastr.options = {
        "closeButton": false,
        "positionClass": "toast-top-center",
    }
    
    $('.timepicker').timepicker({
        icons: {
            up: 'fas fa-sort-up 5x',
            down: 'fas fa-sort-down 5x'
        }
    });

    $('.datepick').datepicker({
        format: "dd-mm-yyyy"
    });
    

    $('.select-js').select2();

    $('.salary_negotiate').click( function(){
        var is_checked = $(this).prop('checked');
        $('#salary').removeAttr('disabled', 'disabled');
        if (is_checked) {
            $('#salary').attr('disabled', 'disabled');
            $('#salary').val('');
        }
    });

    $('.tutoring_time_negotiate').click( function(){
        var is_checked = $(this).prop('checked');
        $('#tutoring_time').removeAttr('disabled', 'disabled');
        if (is_checked) {
            $('#tutoring_time').attr('disabled', 'disabled');
            $('#tutoring_time').val('');
        }
    });

    

    
})