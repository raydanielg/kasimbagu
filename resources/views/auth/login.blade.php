@extends('layouts.auth_split')

@section('title', 'Log in')

@section('content')
<div class="text-center">
    <img src="{{ asset('logo_kasimbagu_agency-removebg-preview.png') }}" alt="Kasimbagu Agency" class="mb-3" style="max-height: 70px;">
    <h2 class="compact-title font-weight-bold">Welcome back</h2>
    <p class="text-muted compact-subtitle">Sign in to your account</p>
</div>

<form id="loginForm" method="POST" action="{{ route('login') }}">
    @csrf

    <div class="mb-2">
        <label for="email" class="form-label">Email</label>
        <div class="input-icon-wrap">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
            </svg>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="you@example.com">
        </div>
        @error('email')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <div class="mb-2">
        <label for="password" class="form-label">Password</label>
        <div class="input-icon-wrap">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor">
                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
            </svg>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
        </div>
        @error('password')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    @if (Route::has('password.request'))
        <div class="mb-2 text-end">
            <a class="small text-decoration-none" href="{{ route('password.request') }}">Forgot your password?</a>
        </div>
    @endif

    <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label small" for="remember">
            Remember me
        </label>
    </div>

    <button type="submit" id="loginBtn" class="btn btn-primary w-100 mb-2 d-flex align-items-center justify-content-center gap-2">
        <span id="loginBtnText">Log in →</span>
        <span id="loginBtnSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
    </button>
</form>
@endsection

@push('scripts')
<script>
document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = this;
    const submitBtn = document.getElementById('loginBtn');
    const btnText = document.getElementById('loginBtnText');
    const btnSpinner = document.getElementById('loginBtnSpinner');
    const loadingOverlay = document.getElementById('loadingOverlay');

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer);
            toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
    });

    // Show loading state
    submitBtn.disabled = true;
    btnText.classList.add('d-none');
    btnSpinner.classList.remove('d-none');
    if (loadingOverlay) loadingOverlay.classList.add('active');

    const formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Toast.fire({
                icon: 'success',
                title: 'Logged in successfully'
            });
            setTimeout(() => {
                window.location.href = data.redirect || '/dashboard';
            }, 1200);
        } else {
            Toast.fire({
                icon: 'error',
                title: data.message || 'Invalid credentials. Please try again.'
            });
        }
    })
    .catch(error => {
        // If JSON response fails, try regular form submission
        form.submit();
    })
    .finally(() => {
        submitBtn.disabled = false;
        btnText.classList.remove('d-none');
        btnSpinner.classList.add('d-none');
        if (loadingOverlay) loadingOverlay.classList.remove('active');
    });
});
</script>
@endpush
