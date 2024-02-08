<x-auth-layouts :title="'Login'">
    <div class="card">
        <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                    <span class="app-brand-logo demo"><x-logo /></span>
                    <span class="app-brand-text demo text-body fw-bold">Stater Kit</span>
                </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2">Welcome to Starter Kit! 👋</h4>
            <p class="mb-4">
                Please sign-in to your account and continue the adventure
            </p>

            <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
                autofocus value="{{ old('email') }}" />
        </div>
        <div class="mb-3 form-password-toggle">

            @if (Route::has('password.request'))
                <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="javascript:void(0);">
                        <small>Forgot Password?</small>
                    </a>
                </div>
            @endif

            <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
        </div>
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember-me"
                    {{ old('remember') ? 'checked' : '' }} />
                <label class="form-check-label" for="remember-me">
                    Remember Me
                </label>
            </div>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">
                Sign in
            </button>
        </div>
    </form>

            @if (Route::has('register'))
                <p class="text-center">
                    <span>New on our platform?</span>
                    <a href="{{ route('register') }}">
                        <span>Create an account</span>
                    </a>
                </p>
            @endif
        </div>
    </div>
</x-auth-layouts>
