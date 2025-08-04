<script src="{{ asset('assets/common/js/sweetalert2.all.min.js') }}"></script>

@if (session()->has('success'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });

        Toast.fire({
            icon: "success",
            title: "{{ session()->get('success') }}"
        });
    </script>
@endif

@if (session()->has('error'))
    <script>
        Swal.fire({
            title: "{{ __('admin.messages.error.title') }}",
            text: "{{ session()->get('error') }}",
            icon: 'error',
            confirmButtonText: "{{ __('admin.general.confirm') }}",
        })
    </script>
@endif

<script>
    document.querySelectorAll('.sweet-alert-delete-form').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            Swal.fire({
                title: "{{ __('admin.messages.confirm.delete.title') }}",
                text: "{{ __('admin.messages.confirm.delete.description') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: "{{ __('admin.general.delete') }}",
                cancelButtonText: "{{ __('admin.general.cancel') }}",
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>