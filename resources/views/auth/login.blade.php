@extends('layouts.app')

@section('content')
<div class="auth-card">
    <div class="auth-header">
        <h2>Welcome Back</h2>
        <p style="color: var(--text-muted);">Please login to your account</p>
    </div>

    @if(session('success'))
        <div style="background: rgba(34, 197, 94, 0.1); color: var(--success-color); padding: 0.75rem; border-radius: 0.5rem; margin-bottom: 1.5rem; text-align: center;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" id="email" name="email" class="form-input" value="{{ old('email') }}" required autofocus>
            @error('email')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-input" required>
            @error('password')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-submit">Login</button>

        <p style="text-align: center; margin-top: 1.5rem; font-size: 0.9rem; color: var(--text-muted);">
            Don't have an account? <a href="{{ route('register') }}" style="color: var(--accent-color); text-decoration: none;">Register</a>
        </p>
    </form>
</div>
@endsection
