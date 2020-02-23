<script type="text/javascript">
$( document ).ready(function() {
	toastr.options = {
        "closeButton": false,
        "positionClass": "toast-top-center",
    }

    @if (session()->has('message.success'))
        toastr.success('{{ session("message.success") }}', '{{ $slot }}');
    @endif

    @if (session()->has('message.error'))
        toastr.error('{{ session("message.error") }}', '{{ $slot }}');
    @endif
});
</script>