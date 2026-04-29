<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
     public function index()
    {
        $pembeli = Pembeli::all();
        return view('admin.pembeli.index', compact('pembeli'));
    }

    public function destroy(Pembeli $id)
    {
        $id->delete();
        return redirect()->route('admin.pembeli.index')->with('success', 'Pembeli berhasil dihapus');
    }
}
