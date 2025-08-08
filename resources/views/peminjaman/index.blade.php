@extends('layouts.app')

@section('title', 'Data Peminjaman')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mx-auto">Data Peminjaman</h2>
        <a href="{{ route('peminjaman.create') }}" class="btn btn-success">+ Tambah Peminjaman</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-warning text-center">
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th style="width: 130px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjamans as $index => $peminjaman)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $peminjaman->nama_mahasiswa }}</td>
                <td>{{ $peminjaman->nim }}</td>
                <td>{{ $peminjaman->buku->judul ?? '-' }}</td>
                <td class="text-center">{{ $peminjaman->tanggal_pinjam }}</td>
                <td class="text-center">{{ $peminjaman->tanggal_kembali }}</td>
                <td class="text-center">
                    <span class="badge {{ $peminjaman->status_pengembalian === 'Dikembalikan' ? 'bg-success' : 'bg-warning text-dark' }}">
                        {{ $peminjaman->status_pengembalian }}
                    </span>
                </td>
                <td class="text-center">
                    <div class="d-flex justify-content-center gap-1">
                        <a href="{{ route('peminjaman.edit', $peminjaman->id) }}" class="btn btn-sm btn-primary" title="Edit">✏️</a>

                        <form action="{{ route('peminjaman.destroy', $peminjaman->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus">🗑️</button>
                        </form>

                        @if($peminjaman->status_pengembalian === 'Dipinjam')
                            <form action="{{ route('peminjaman.kembalikan', $peminjaman->id) }}" method="POST" onsubmit="return confirm('Tandai sudah dikembalikan?')">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-success" title="Kembalikan">✔️</button>
                            </form>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
