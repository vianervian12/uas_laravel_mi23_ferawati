@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 1200px; width: 100%;">
    <div style="margin-bottom: 3rem;">
        <h1 style="font-size: 2rem; margin-bottom: 0.5rem; color: var(--text-color);">Dashboard</h1>
        <p style="color: var(--text-muted);">Welcome back, <span style="color: var(--accent-color);">{{ Auth::user()->name }}</span></p>
    </div>

    <div class="dashboard-stats">
        <div class="stat-card">
            <span class="stat-number">{{ $totalProducts }}</span>
            <span class="stat-label">Total Products</span>
        </div>
        <div class="stat-card">
            <span class="stat-number">{{ $totalCategories }}</span>
            <span class="stat-label">Total Categories</span>
        </div>
        <div class="stat-card">
            <span class="stat-number">{{ $totalUsers }}</span>
            <span class="stat-label">Total Users</span>
        </div>
    </div>

    <div class="auth-card" style="max-width: 100%; text-align: left;">
        <h3 style="margin-bottom: 1.5rem; font-size: 1.5rem;">Quick Actions</h3>
        <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
            <a href="{{ route('categories.index') }}" class="btn btn-register" style="text-decoration: none; margin-left: 0;">Manage Categories</a>
            <a href="{{ route('products.index') }}" class="btn btn-login" style="text-decoration: none;">Manage Products</a>
        </div>
    </div>
</div>
@endsection
