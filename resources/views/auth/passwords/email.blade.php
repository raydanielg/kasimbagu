@extends('layouts.auth_minimal')

@section('title', __('Reset Password'))

@section('content')
    @if (session('status'))
        <div class="alert alert-success mb-4" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label visually-hidden">{{ __('Email Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="you@example.com">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            {{ __('Send Password Reset Link') }}
        </button>

        <p class="auth-footer-link mt-4">
            <a href="{{ route('login') }}">← Back to Log in</a>
        </p>
    </form>
@endsection
