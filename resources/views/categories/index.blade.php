@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 1000px; width: 100%;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <div>
            <h1 style="font-size: 2rem; margin-bottom: 0.5rem; color: var(--text-color);">Category Management</h1>
            <p style="color: var(--text-muted);">Manage your product categories</p>
        </div>
        <a href="{{ route('categories.create') }}" class="btn btn-register" style="margin-left: 0; text-decoration: none;">Add New Category</a>
    </div>

    @if(session('success'))
        <div style="background: rgba(34, 197, 94, 0.1); color: var(--success-color); padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem; border: 1px solid rgba(34, 197, 94, 0.2);">
            {{ session('success') }}
        </div>
    @endif

    <div style="background: rgba(30, 41, 59, 0.6); border-radius: 1rem; padding: 1.5rem; border: 1px solid rgba(255, 255, 255, 0.05);">
        @if($categories->isEmpty())
            <p style="text-align: center; color: var(--text-muted);">No categories found.</p>
        @else
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->nama_kategori }}</td>
                            <td>{{ $category->created_at->format('d M Y, H:i') }}</td>
                            <td>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline-form" onsubmit="return confirm('Are you sure you want to delete this category?');">
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
