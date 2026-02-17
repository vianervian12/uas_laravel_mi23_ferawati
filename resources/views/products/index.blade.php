@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 1000px; width: 100%;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <div>
            <h1 style="font-size: 2rem; margin-bottom: 0.5rem; color: var(--text-color);">Product Management</h1>
            <p style="color: var(--text-muted);">Manage your products</p>
        </div>
        <a href="{{ route('products.create') }}" class="btn btn-register" style="margin-left: 0; text-decoration: none;">Add New Product</a>
    </div>

    @if(session('success'))
        <div style="background: rgba(34, 197, 94, 0.1); color: var(--success-color); padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem; border: 1px solid rgba(34, 197, 94, 0.2);">
            {{ session('success') }}
        </div>
    @endif

    <div style="background: rgba(30, 41, 59, 0.6); border-radius: 1rem; padding: 1.5rem; border: 1px solid rgba(255, 255, 255, 0.05);">
        @if($products->isEmpty())
            <p style="text-align: center; color: var(--text-muted);">No products found.</p>
        @else
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 0.5rem;">
                                @else
                                    <span style="color: var(--text-muted);">No Image</span>
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->nama_kategori ?? 'Uncategorized' }}</td>
                            <td>
                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline-form" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete" style="border: none; cursor: pointer;">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    
    <div style="margin-top: 2rem;">
        <a href="{{ route('dashboard') }}" style="color: var(--text-muted); text-decoration: none;">&larr; Back to Dashboard</a>
    </div>
</div>
@endsection
