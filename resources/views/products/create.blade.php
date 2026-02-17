@extends('layouts.app')

@section('content')
<div class="auth-card" style="max-width: 600px;">
    <div class="auth-header">
        <h2>Add New Product</h2>
        <p style="color: var(--text-muted);">Create a new product for your catalog</p>
    </div>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" id="name" name="name" class="form-input" value="{{ old('name') }}" required autofocus>
            @error('name')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="category_id" class="form-label">Category</label>
            <select id="category_id" name="category_id" class="form-input" required style="appearance: none; -webkit-appearance: none;">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-input" rows="4">{{ old('description') }}</textarea>
            @error('description')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" id="image" name="image" class="form-input" accept="image/*">
            @error('image')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-submit">Create Product</button>

        <div style="text-align: center; margin-top: 1.5rem;">
            <a href="{{ route('products.index') }}" style="color: var(--text-muted); text-decoration: none; font-size: 0.9rem;">Cancel</a>
        </div>
    </form>
</div>
@endsection
