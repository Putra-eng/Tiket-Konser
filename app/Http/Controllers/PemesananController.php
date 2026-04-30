<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use App\Models\Pemesanan;
use App\Models\Tiket;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
       public function index()
    {
        $tikets = Tiket::all();
        return view('dashboard', compact('tikets'));
    }

    public function indexAdmin()
    {
        $pemesanan = Pemesanan::with(['pembeli', 'tiket'])->get();
        return view('admin.pemesanan.index', compact('pemesanan'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'email'     => 'required|email',
            'no_hp'     => 'required|string|max:20',
            'jumlah'    => 'required|integer|min:1',
            'id_tiket'  => 'required|exists:tiket,id_tiket',
        ]);

        $tiket = Tiket::findOrFail($request->id_tiket);

        // Cek stok cukup
        if ($tiket->stok < $request->jumlah) {
            return back()->withErrors(['stok' => 'Stok tiket tidak mencukupi.'])->withInput();
        }

        // Simpan data pembeli
        $pembeli = Pembeli::create([
            'nama'  => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
        ]);

        // Hitung total harga
        $totalHarga = $tiket->harga * $request->jumlah;

        // Simpan pemesanan
        $pemesanan = Pemesanan::create([
            'id_pembeli'  => $pembeli->id_pembeli,
            'id_tiket'    => $tiket->id_tiket,
            'jumlah'      => $request->jumlah,
            'total_harga' => $totalHarga,
        ]);

        // Kurangi stok
        $tiket->decrement('stok', $request->jumlah);

        return redirect()->route('pembayaran', $pemesanan->id_pemesanan);
    }

    public function show($id)
    {
        $pemesanan = Pemesanan::with(['pembeli', 'tiket'])->findOrFail($id);
        return view('pembayaran', compact('pemesanan'));
    }

    public function destroy(Pemesanan $id)
    {
        $id->delete();
        return redirect()->route('admin.pemesanan.index')->with('success', 'Pemesanan berhasil dihapus');
    }
}
