@extends('layouts.auth_split')

@section('title', 'Reset Password')

@section('content')
<div class="text-center mb-4">
    <h2 class="h3 font-weight-bold">Forgot your password?</h2>
    <p class="text-muted">No problem. Just let us know your email address and we'll send you a reset link.</p>
</div>

@if (session('status'))
    <div class="alert alert-success mb-4" role="alert">
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="you@example.com">
        @error('email')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary w-100 mb-3">
        Send Password Reset Link →
    </button>

    <p class="text-center mt-4">
        <a href="{{ route('login') }}" class="text-decoration-none">← Back to Log in</a>
    </p>
</form>
@endsection
