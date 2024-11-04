@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center min-vh-100" style="background: url('/path/to/your/background.jpg') no-repeat center center/cover;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-3 bg-opacity">
                    <div class="card-header bg-gradient-primary text-white text-center py-4">
                        <h4 class="mb-0">{{ __('Login') }}</h4>
                    </div>

                    <div class="card-body p-5">
                        <form method="POST" action="{{ route('login') }}" id="loginForm">
                            @csrf

                            <div class="form-floating mb-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                <label for="email">{{ __('Email Address') }}</label>
                                @error('email')
                                    <div class="in  valid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-4">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                <label for="password">{{ __('Password') }}</label>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group form-check mb-4">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary btn-lg btn-block animate-button">
                                    <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                    {{ __('Login') }}
                                </button>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="d-block text-center text-decoration-none mt-2" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-gradient-primary {
        background: linear-gradient(45deg, #007bff, #6610f2);
    }

    .bg-opacity {
        background-color: rgba(255, 255, 255, 0.85);
        border-radius: 10px;
    }

    .animate-button {
        position: relative;
        overflow: hidden;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .animate-button.loading .spinner-border {
        display: inline-block !important;
    }

    .form-floating label {
        padding-left: 0.75rem;
        padding-right: 0.75rem;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #181269;
    }

    .card-body {
        background: #bbc0fc;
    }

    .min-vh-100 {
        min-height: 100vh;
    }
</style>

<script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const submitButton = this.querySelector('button[type="submit"]');
        submitButton.classList.add('loading', 'disabled');
        submitButton.querySelector('.spinner-border').classList.remove('d-none');
        submitButton.innerHTML = 'Logging in...';

        // Simulate a delay for demo purposes
        setTimeout(() => {
            this.submit();
        }, 1500);
    });
</script>
@endsection