@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="container mt-4">
    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-md-12 text-center">
            <h1 class="fw-bold text-primary mb-3">📖 Selamat Datang di Sistem Perpustakaan</h1>
            <p class="lead text-secondary">Sistem ini membantu mengelola data buku, peminjaman, dan pengembalian dengan cepat dan mudah.</p>
        </div>
    </div>

    <!-- Info Cards -->
    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0 rounded-4 text-center bg-info text-white">
                <div class="card-body">
                    <i class="fas fa-book fa-2x mb-2"></i>
                    <h5>Total Buku</h5>
                    <h2 class="fw-bold">{{ \App\Models\Buku::count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0 rounded-4 text-center bg-success text-white">
                <div class="card-body">
                    <i class="fas fa-hand-holding fa-2x mb-2"></i>
                    <h5>Total Peminjaman</h5>
                    <h2 class="fw-bold">{{ \App\Models\Peminjaman::count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0 rounded-4 text-center bg-warning text-dark">
                <div class="card-body">
                    <i class="fas fa-hourglass-half fa-2x mb-2"></i>
                    <h5>Masih Dipinjam</h5>
                    <h2 class="fw-bold">
                        {{ \App\Models\Peminjaman::where('status_pengembalian', 'Dipinjam')->count() }}
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigasi Cepat -->
    <div class="row justify-content-center mb-5">
        <div class="col-md-4 mb-3">
            <a href="{{ route('buku.index') }}" class="btn btn-outline-primary btn-lg w-100 rounded-pill shadow-sm">
                <i class="fas fa-book me-2"></i> Kelola Buku
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('peminjaman.index') }}" class="btn btn-outline-success btn-lg w-100 rounded-pill shadow-sm">
                <i class="fas fa-book-reader me-2"></i> Data Peminjaman
            </a>
        </div>
    </div>

    <!-- Footer Text -->
    <div class="text-center text-muted small">
        <p>📌 Sistem ini dibuat untuk mendukung efisiensi perpustakaan digital modern.</p>
    </div>
</div>
@endsection
