<!-- jQuery -->
<script src="{{ asset("plugins/jquery/jquery.min.js") }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset("plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset("plugins/bs-custom-file-input/bs-custom-file-input.min.js") }}"></script>
<script src="{{ asset("dist/js/adminlte.min.js") }}"></script>
<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
<script>
    const adminId = {{ auth('admin')->user()->id }};
</script>
@include('sweetalert::alert')
@vite('resources/js/notification.js')
<script>
    function confirmAction(id, name, action) {
        event.preventDefault();
        Swal.fire({
            title: '@lang('Are you sure?')',
            text: '@lang('You won\'t be able to revert this!')',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: '@lang('Confirm')',
            cancelButtonText: '@lang('Cancel')',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-' + name + '-' + id).submit();
            }
        });
    }
</script>

@stack('scripts')
