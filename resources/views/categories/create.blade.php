@extends('layouts.app')

@section('content')
<div class="auth-card">
    <div class="auth-header">
        <h2>Add New Category</h2>
        <p style="color: var(--text-muted);">Create a new product category</p>
    </div>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_kategori" class="form-label">Category Name</label>
            <input type="text" id="nama_kategori" name="nama_kategori" class="form-input" value="{{ old('nama_kategori') }}" required autofocus>
            @error('nama_kategori')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-submit">create Category</button>

        <div style="text-align: center; margin-top: 1.5rem;">
            <a href="{{ route('categories.index') }}" style="color: var(--text-muted); text-decoration: none; font-size: 0.9rem;">Cancel</a>
        </div>
    </form>
</div>
@endsection
