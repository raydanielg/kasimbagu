@extends('layouts.auth_minimal')

@section('title', __('Log in'))

@section('content')
<form method="POST" action="{{ route('login') }}" data-loading>
    @csrf

    <div class="mb-3">
        <label for="email" class="form-label visually-hidden">{{ __('Email') }}</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="you@example.com">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    @if (Route::has('password.request'))
        <div class="mb-3 text-end">
            <a class="small text-decoration-none" href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
        </div>
    @endif

    {{-- Password field is removed to match the single-field login UI, assuming a passwordless flow or a second step. --}}
    {{-- If password is required on this step, uncomment the block below. --}}
    {{-- <div class="mb-3">
        <label for="password" class="form-label visually-hidden">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div> --}}

    <button type="button" id="continueBtn" class="btn btn-primary w-100 mb-3">
        {{ __('Continue') }} →
    </button>

    <div class="divider">or</div>

    <!-- Social Login: Google only -->
    <a href="{{ route('google.redirect') }}" class="social-btn btn btn-light w-100">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 533.5 544.3" width="20" height="20" class="me-2">
            <path fill="#EA4335" d="M533.5 278.4c0-18.5-1.7-36.3-4.9-53.6H272v101.5h146.9c-6.3 34-25.2 62.7-53.9 82v68.1h87.2c51-47 81.3-116.2 81.3-198z"/>
            <path fill="#34A853" d="M272 544.3c72.7 0 133.7-24 178.3-65.1l-87.2-68.1c-24.2 16.2-55.2 25.8-91.1 25.8-69.9 0-129.1-47.1-150.3-110.4H32.6v69.4C76.8 486.1 168.9 544.3 272 544.3z"/>
            <path fill="#4A90E2" d="M121.7 326.5c-10.2-30-10.2-62.6 0-92.6v-69.4H32.6C11.7 214 0 242.6 0 272.1s11.7 58.1 32.6 107.6l89.1-53.2z"/>
            <path fill="#FBBC05" d="M272 107.7c39.6-.6 77.7 14 106.7 41.5l79.7-79.7C407.6 25.3 344.6-.2 272 0 168.9 0 76.8 58.2 32.6 164.1l89.1 69.7C142.9 154.5 202.1 107.4 272 107.7z"/>
        </svg>
        Continue with Google
    </a>

    <p class="auth-footer-link mt-4">
        Don't have an account? <a href="{{ route('register') }}">Sign up</a>
    </p>
    <input type="hidden" name="password" id="hiddenPassword">
</form>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const btn = document.getElementById('continueBtn');
  const form = document.querySelector('form[data-loading]');
  const emailInput = document.getElementById('email');

  if (!btn || !form || !emailInput) return;

  btn.addEventListener('click', async () => {
    const email = (emailInput.value || '').trim();
    if (!email) {
      return window.Swal ? Swal.fire({icon:'warning', title:'Email required', toast:true, position:'top-end', timer:2500, showConfirmButton:false}) : alert('Email required');
    }

    try {
      const res = await fetch('{{ route('auth.checkEmail') }}', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ email })
      });
      const data = await res.json();

      if (data.exists) {
        if (window.Swal) {
          const { value: password } = await Swal.fire({
            title: 'Enter your password',
            input: 'password',
            inputLabel: 'Password',
            inputPlaceholder: '••••••••',
            inputAttributes: { autocapitalize: 'off', autocomplete: 'current-password' },
            showCancelButton: true,
            confirmButtonText: 'Login',
          });
          if (password) {
            document.getElementById('hiddenPassword').value = password;
            form.submit();
          }
        } else {
          const pwd = prompt('Enter your password');
          if (pwd) {
            document.getElementById('hiddenPassword').value = pwd;
            form.submit();
          }
        }
      } else {
        return window.Swal ? Swal.fire({icon:'error', title:'No account with that email', toast:true, position:'top-end', timer:3000, showConfirmButton:false}) : alert('No account with that email');
      }
    } catch (e) {
      return window.Swal ? Swal.fire({icon:'error', title:'Network error', toast:true, position:'top-end', timer:3000, showConfirmButton:false}) : alert('Network error');
    }
  });
});
</script>
@endsection
