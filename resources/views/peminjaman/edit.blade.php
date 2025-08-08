@extends('layouts.app')

@section('title', 'Edit Peminjaman')

@section('content')
    <div class="container">
        <h2 class="mb-4">Edit Data Peminjaman</h2>

        <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
                <input type="text" name="nama_mahasiswa" class="form-control" value="{{ $peminjaman->nama_mahasiswa }}" required>
            </div>

            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control" value="{{ $peminjaman->nim }}" required>
            </div>

            <div class="mb-3">
                <label for="buku_id" class="form-label">Nama Buku</label>
                <select name="buku_id" class="form-select" required>
                    <option value="">-- Pilih Buku --</option>
                    @foreach($bukus as $buku)
                        <option value="{{ $buku->id }}" {{ $buku->id == $peminjaman->buku_id ? 'selected' : '' }}>{{ $buku->judul }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" class="form-control" value="{{ $peminjaman->tanggal_pinjam }}" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" class="form-control" value="{{ $peminjaman->tanggal_kembali }}" required>
            </div>

            <div class="mb-3">
                <label for="status_pengembalian" class="form-label">Status Pengembalian</label>
                <select name="status_pengembalian" class="form-select" required>
                    <option value="Dipinjam" {{ $peminjaman->status_pengembalian == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    <option value="Dikembalikan" {{ $peminjaman->status_pengembalian == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
