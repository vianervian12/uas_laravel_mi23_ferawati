@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 1200px; width: 100%;">
    <div style="text-align: center; margin-bottom: 3rem;">
        <h1 style="font-size: 2.5rem; margin-bottom: 1rem; background: linear-gradient(to right, var(--accent-color), var(--secondary-color)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Our Collection</h1>
        <p style="color: var(--text-muted); font-size: 1.1rem;">Discover our latest products</p>
    </div>

    @if($products->isEmpty())
        <div style="text-align: center; padding: 4rem; background: rgba(30, 41, 59, 0.4); border-radius: 1rem;">
            <p style="color: var(--text-muted); font-size: 1.2rem;">No products found yet.</p>
        </div>
    @else
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 2rem;">
            @foreach($products as $product)
                <div style="background: rgba(30, 41, 59, 0.6); border-radius: 1rem; overflow: hidden; border: 1px solid rgba(255, 255, 255, 0.05); transition: transform 0.3s ease;">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100%; height: 200px; object-fit: cover;">
                    @else
                        <div style="width: 100%; height: 200px; background: rgba(15, 23, 42, 0.5); display: flex; align-items: center; justify-content: center; color: var(--text-muted);">
                            No Image
                        </div>
                    @endif
                    
                    <div style="padding: 1.5rem;">
                        <span style="display: inline-block; padding: 0.25rem 0.75rem; background: rgba(56, 189, 248, 0.1); color: var(--accent-color); border-radius: 1rem; font-size: 0.75rem; margin-bottom: 0.5rem;">
                            {{ $product->category->nama_kategori ?? 'Uncategorized' }}
                        </span>
                        <h3 style="margin: 0.5rem 0; font-size: 1.25rem;">{{ $product->name }}</h3>
                        <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1rem;">
                            {{ Str::limit($product->description, 100) }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
