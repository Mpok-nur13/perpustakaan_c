<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Buku;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjamans = Peminjaman::with('buku')->get();
        return view('peminjaman.index', compact('peminjamans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bukus = Buku::all();
        return view('peminjaman.create', compact('bukus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nama_mahasiswa' => 'required',
        'nim' => 'required',
        'buku_id' => 'required|exists:bukus,id',
        'tanggal_pinjam' => 'required|date',
        'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
    ]);

    Peminjaman::create([
        'nama_mahasiswa' => $request->nama_mahasiswa,
        'nim' => $request->nim,
        'buku_id' => $request->buku_id,
        'tanggal_pinjam' => $request->tanggal_pinjam,
        'tanggal_kembali' => $request->tanggal_kembali,
        'status_pengembalian' => 'Dipinjam',
    ]);

    return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id); // pastikan variabel ini ada
        $bukus = Buku::all(); // untuk dropdown pilihan buku

        return view('peminjaman.edit', compact('peminjaman', 'bukus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'nama_mahasiswa' => 'required',
        'nim' => 'required',
        'buku_id' => 'required|exists:bukus,id',
        'tanggal_pinjam' => 'required|date',
        'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        'status_pengembalian' => 'required|in:Dipinjam,Dikembalikan',
    ]);

    $peminjaman = Peminjaman::findOrFail($id);

    $peminjaman->update([
        'nama_mahasiswa' => $request->nama_mahasiswa,
        'nim' => $request->nim,
        'buku_id' => $request->buku_id,
        'tanggal_pinjam' => $request->tanggal_pinjam,
        'tanggal_kembali' => $request->tanggal_kembali,
        'status_pengembalian' => $request->status_pengembalian,
    ]);

    return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil dihapus');
    }

    public function kembalikan($id)
{
    $peminjaman = Peminjaman::findOrFail($id);
    $peminjaman->status_pengembalian = 'Dikembalikan';
    $peminjaman->save();

    return redirect()->route('peminjaman.index')->with('success', 'Status pengembalian berhasil diperbarui.');
}

}
