<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanan = Pemesanan::with(['pembeli', 'tiket'])->latest()->get();
        return view('admin.pemesanan.index', compact('pemesanan'));
    }

    public function destroy(Pemesanan $id)
    {
        $id->delete();
        return redirect()->route('admin.pemesanan.index')->with('success', 'Pemesanan berhasil dihapus');
    }
}
