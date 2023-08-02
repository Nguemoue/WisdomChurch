@if (session()->has('messages'))
    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": false,
            "rtl": false,
            // "positionClass": "toast-top-full-width",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": 300,
            "hideDuration": 400,
            "timeOut": 5000,
            "extendedTimeOut": 500,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        @if (session()->has('messages.info'))
            toastr["info"](`{{ session('messages.info') }}`, "Information")
        @endif
        @if (session()->has('messages.success'))
            toastr["success"](`{{ session('messages.success') }}`, "Information")
        @endif
        @if (session()->has('messages.error'))
            toastr["error"](`{{ session('messages.error') }}`, "Attention")
        @endif
    </script>
@endif
