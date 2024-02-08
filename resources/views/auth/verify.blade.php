<x-auth-layouts :title="'Verification'">
    <div class="card">
        <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                    <span class="app-brand-logo demo"> <x-logo /> </span>
                    <span class="app-brand-text demo text-body fw-bold">Sneat</span>
                </a>
            </div>
            <!-- /Logo -->
            <h3 class="mb-2">Verify your email ✉️</h3>
            <p class="text-start">
                Account activation link sent to your email address: {{ $email ? $email : '' }} Please follow the link
                inside to
                continue.
            </p>
            <p class="text-center">
                Didn't get the mail?
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-link">{{ __('Resend') }}</button>.
            </form>
            </p>
        </div>
    </div>
</x-auth-layouts>
