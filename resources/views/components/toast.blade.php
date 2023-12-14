@if (session('message') == 'error' | $errors->any())
    <!-- Message danger-->
    <div id="myToast" class="bs-toast toast fade show position-fixed bg-danger top-0 end-0 mt-2 me-2" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <i class="bx bx-error me-2"></i>
            <div class="me-auto fw-semibold">{{ __('An error occured') }}</div>
            <small>{{ __('just now') }}</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        @if (session('message') == 'error')
            <div class="toast-body">{{ session('data') }}</div>
        @elseif ($errors->any())
            <div class="toast-body">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <!-- Message danger-->
@elseif (session('message') == 'success')
    <!-- Message danger-->
    <div id="myToast" class="bs-toast toast fade show position-fixed bg-success top-0 end-0 mt-2 me-2" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <i class="bx bx-success me-2"></i>
            <div class="me-auto fw-semibold">{{ __('Successful') }}</div>
            <small>{{ __('just now') }}</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">{{ session('data') }}</div>
    </div>
    <!-- Message danger-->
@endif
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
