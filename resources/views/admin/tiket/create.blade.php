@extends('layouts.admin')

@section('title', 'Tambah Tiket')
@section('page_title', 'Tambah Tiket Baru')

@section('content')
<style>
    :root {
        --color-navy: #001F3F;
        --color-cream: #F5F5DC;
        --color-gold: #D4AF37;
    }
</style>

<div class="max-w-2xl">
    <div class="bg-white rounded-lg shadow-md p-8">
        <form action="{{ route('admin.tiket.store') }}" method="POST">
            @csrf

            <div class="mb-6">
                <label for="kategori" class="block text-sm font-semibold mb-2" style="color: var(--color-navy)">Kategori Tiket</label>
                <select id="kategori" name="kategori" class="w-full px-4 py-2 border-2 rounded-lg focus:outline-none" style="border-color: var(--color-gold); color: var(--color-navy)" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Reguler" {{ old('kategori') === 'Reguler' ? 'selected' : '' }}>Reguler</option>
                    <option value="VIP" {{ old('kategori') === 'VIP' ? 'selected' : '' }}>VIP</option>
                    <option value="VVIP" {{ old('kategori') === 'VVIP' ? 'selected' : '' }}>VVIP</option>
                </select>
                @error('kategori')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="harga" class="block text-sm font-semibold mb-2" style="color: var(--color-navy)">Harga (Rp)</label>
                <input type="number" id="harga" name="harga" value="{{ old('harga') }}" class="w-full px-4 py-2 border-2 rounded-lg focus:outline-none" style="border-color: var(--color-gold)" required min="0" step="1000">
                @error('harga')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="stok" class="block text-sm font-semibold mb-2" style="color: var(--color-navy)">Stok</label>
                <input type="number" id="stok" name="stok" value="{{ old('stok') }}" class="w-full px-4 py-2 border-2 rounded-lg focus:outline-none" style="border-color: var(--color-gold)" required min="0">
                @error('stok')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit" class="px-6 py-2 text-black font-semibold rounded-lg transition hover:opacity-90" style="background-color: var(--color-gold)">
                    <i class="fas fa-save mr-2"></i>Simpan
                </button>
                <a href="{{ route('admin.tiket.index') }}" class="px-6 py-2 text-white font-semibold rounded-lg transition hover:opacity-90" style="background-color: var(--color-navy); display: inline-block; text-decoration: none">
                    <i class="fas fa-times mr-2"></i>Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
