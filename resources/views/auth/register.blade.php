@extends('layouts.auth_split')

@section('title', __('Create your account'))

@section('content')
<div class="text-center mb-4">
    <h2 class="h3 font-weight-bold">Let's create your account</h2>
    <p class="text-muted">Already have an account? <a href="{{ route('login') }}">Log in →</a></p>
</div>

<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="row g-3">
        <div class="col-md-6 mb-3">
            <label for="first_name" class="form-label">First name</label>
            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="given-name" autofocus placeholder="Your first name">
            @error('first_name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="col-md-6 mb-3">
            <label for="last_name" class="form-label">Last name</label>
            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="family-name" placeholder="Your last name">
            @error('last_name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="you@example.com">
        @error('email')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Create a strong password">
        @error('password')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" value="" id="terms" required>
        <label class="form-check-label" for="terms">
            I agree to the <a href="#">Terms of Service and Privacy Policy</a>
        </label>
    </div>

    <button type="submit" class="btn btn-primary w-100 mb-3">
        Continue →
    </button>

    <div class="divider">or</div>

    <a href="#" class="btn btn-light social-btn w-100">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 533.5 544.3" width="20" height="20" class="me-2">
            <path fill="#EA4335" d="M533.5 278.4c0-18.5-1.7-36.3-4.9-53.6H272v101.5h146.9c-6.3 34-25.2 62.7-53.9 82v68.1h87.2c51-47 81.3-116.2 81.3-198z"/>
            <path fill="#34A853" d="M272 544.3c72.7 0 133.7-24 178.3-65.1l-87.2-68.1c-24.2 16.2-55.2 25.8-91.1 25.8-69.9 0-129.1-47.1-150.3-110.4H32.6v69.4C76.8 486.1 168.9 544.3 272 544.3z"/>
            <path fill="#4A90E2" d="M121.7 326.5c-10.2-30-10.2-62.6 0-92.6v-69.4H32.6C11.7 214 0 242.6 0 272.1s11.7 58.1 32.6 107.6l89.1-53.2z"/>
            <path fill="#FBBC05" d="M272 107.7c39.6-.6 77.7 14 106.7 41.5l79.7-79.7C407.6 25.3 344.6-.2 272 0 168.9 0 76.8 58.2 32.6 164.1l89.1 69.7C142.9 154.5 202.1 107.4 272 107.7z"/>
        </svg>
        Continue with Google
    </a>
</form>
@endsection
