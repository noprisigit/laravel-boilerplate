<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="successToast" class="toast colored-toast bg-success-transparent" role="alert" aria-live="assertive"
        aria-atomic="true">
        <div class="toast-header bg-success text-fixed-white">
            <strong class="me-auto">{{ __('Sukses') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ Session::get('success') }}
        </div>
    </div>
</div>

@if (Session::has('success'))
    <script>
        const toast = new bootstrap.Toast(document.getElementById('successToast'))
        toast.show();
    </script>
@endif

<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="errorToast" class="toast colored-toast bg-danger-transparent" role="alert" aria-live="assertive"
        aria-atomic="true">
        <div class="toast-header bg-danger text-fixed-white">
            <strong class="me-auto">{{ __('Gagal') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ Session::get('error') }}
        </div>
    </div>
</div>

@if (Session::has('error'))
    <script>
        const toast = new bootstrap.Toast(document.getElementById('errorToast'))
        toast.show();
    </script>
@endif

<script>
    window.addEventListener('showToastSuccess', (event) => {
        const message = event.detail[0].message ?? '';
        $('#successToast .toast-body').html(message);

        const toast = new bootstrap.Toast(document.getElementById('successToast'))
        toast.show();
    })
</script>

<script>
    window.addEventListener('showToastError', (event) => {
        const message = event.detail[0].message ?? '';
        $('#errorToast .toast-body').html(message);

        const toast = new bootstrap.Toast(document.getElementById('errorToast'))
        toast.show();
    })
</script>
