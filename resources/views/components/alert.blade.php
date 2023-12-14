@props(['res', 'title', 'message'])


<div id="myToast" class="bs-toast toast fade show position-fixed {{ 'bg-' . $res }} top-0 end-0 mt-2 me-2" role="alert"
    aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <i class="bx bx-error me-2"></i>
        <div class="me-auto fw-semibold">{{ $title }}</div>
        <small>{{ __('just now') }}</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">{{ $message }}</div>
</div>
<script>
    // Hide the toast after 10 seconds
    setTimeout(function() {
        var myToast = document.getElementById('myToast');
        if (myToast) {
            var bootstrapToast = new bootstrap.Toast(myToast);
            bootstrapToast.hide();
        }
    }, 7000);
</script>
