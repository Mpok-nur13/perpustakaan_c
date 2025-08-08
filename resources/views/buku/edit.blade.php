@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
    <div class="mb-4">
        <h2 class="text-center">Edit Buku</h2>
    </div>

    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul" class="form-label">Judul Buku</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $buku->judul) }}" required>
        </div>

        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input type="text" name="penulis" id="penulis" class="form-control" value="{{ old('penulis', $buku->penulis) }}" required>
        </div>

        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" name="penerbit" id="penerbit" class="form-control" value="{{ old('penerbit', $buku->penerbit) }}" required>
        </div>

        <div class="mb-3">
            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
            <input type="number" name="tahun_terbit" id="tahun_terbit" class="form-control" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" required min="1000" max="9999">
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah Buku</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ old('jumlah', $buku->jumlah) }}" required min="1">
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Perbarui</button>
        </div>
    </form>
@endsection
