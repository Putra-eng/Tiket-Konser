<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    public function index()
    {
        $tikets = Tiket::all();
        return view('admin.tiket.index', compact('tikets'));
    }

    public function create()
    {
        return view('admin.tiket.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        Tiket::create($validated);

        return redirect()->route('admin.tiket.index')->with('success', 'Tiket berhasil ditambahkan');
    }

    public function edit(Tiket $id)
    {
        return view('admin.tiket.edit', ['tiket' => $id]);
    }

    public function update(Request $request, Tiket $id)
    {
        $validated = $request->validate([
            'kategori' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        $id->update($validated);

        return redirect()->route('admin.tiket.index')->with('success', 'Tiket berhasil diperbarui');
    }

    public function destroy(Tiket $id)
    {
        $id->delete();
        return redirect()->route('admin.tiket.index')->with('success', 'Tiket berhasil dihapus');
    }
}
