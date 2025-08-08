@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mx-auto">Daftar Buku</h2>
        <a href="{{ route('buku.create') }}" class="btn btn-success">+ Tambah Buku</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-warning text-center">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Jumlah</th> {{-- Tambahan --}}
                <th style="width: 100px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bukus as $index => $buku)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>{{ $buku->penerbit }}</td>
                <td class="text-center">{{ $buku->tahun_terbit }}</td>
                <td class="text-center">{{ $buku->jumlah }}</td> {{-- Tambahan --}}
                <td class="text-center">
                    <div class="d-flex justify-content-center gap-1">
                        <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-sm btn-primary" title="Edit">✏️</a>
                        <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" onsubmit="return confirm('Yakin hapus buku ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus">🗑️</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
