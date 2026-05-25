@extends('layouts.auth_split')

@section('title', 'Reset Password')

@section('content')
<div class="text-center mb-4">
    <h2 class="h3 font-weight-bold">Reset Password</h2>
    <p class="text-muted">Enter your new password below.</p>
</div>

<form method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="you@example.com">
        @error('email')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">New Password</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="New Password">
        @error('password')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="password-confirm" class="form-label">Confirm Password</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm New Password">
    </div>

    <button type="submit" class="btn btn-primary w-100 mb-3">
        Reset Password →
    </button>

    <p class="text-center mt-4">
        <a href="{{ route('login') }}" class="text-decoration-none">← Back to Log in</a>
    </p>
</form>
@endsection
