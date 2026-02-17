@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 800px; width: 100%;">
    <div class="auth-card" style="max-width: 100%;">
        <div style="text-align: center; margin-bottom: 2rem;">
            <h1 style="font-size: 2.5rem; margin-bottom: 1rem; color: var(--text-color);">About The Developer</h1>
            <div style="width: 60px; height: 4px; background: var(--primary-color); margin: 0 auto; border-radius: 2px;"></div>
        </div>

        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            <div style="display: flex; border-bottom: 1px solid rgba(255, 255, 255, 0.05); padding-bottom: 1rem;">
                <span style="min-width: 150px; color: var(--text-muted); font-weight: 500;">NIM</span>
                <span style="color: var(--text-color); font-weight: 600;">2357401008</span>
            </div>
            
            <div style="display: flex; border-bottom: 1px solid rgba(255, 255, 255, 0.05); padding-bottom: 1rem;">
                <span style="min-width: 150px; color: var(--text-muted); font-weight: 500;">Nama</span>
                <span style="color: var(--text-color); font-weight: 600;">Ferawati</span>
            </div>

            <div style="display: flex; border-bottom: 1px solid rgba(255, 255, 255, 0.05); padding-bottom: 1rem;">
                <span style="min-width: 150px; color: var(--text-muted); font-weight: 500;">Kelas</span>
                <span style="color: var(--text-color); font-weight: 600;">MI23</span>
            </div>

            <div style="display: flex; border-bottom: 1px solid rgba(255, 255, 255, 0.05); padding-bottom: 1rem;">
                <span style="min-width: 150px; color: var(--text-muted); font-weight: 500;">Github</span>
                <a href="https://github.com/uas_laravel_mi23" style="color: var(--accent-color); text-decoration: none;">https://github.com/vianervian12/uas_laravel_mi23_ferawati.git</a>
            </div>
        </div>
    </div>
</div>
@endsection
