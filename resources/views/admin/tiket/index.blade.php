@extends('layouts.admin')

@section('title', 'Tiket Management')
@section('page_title', 'Manajemen Tiket')

@section('content')
<style>
    :root {
        --color-navy: #001F3F;
        --color-cream: #F5F5DC;
        --color-gold: #D4AF37;
    }
</style>

<div class="mb-6">
    <a href="{{ route('admin.tiket.create') }}" class="inline-block px-6 py-3 text-black font-semibold rounded-lg transition hover:opacity-90" style="background-color: var(--color-gold)">
        <i class="fas fa-plus mr-2"></i>Tambah Tiket
    </a>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <table class="w-full">
        <thead style="background-color: var(--color-navy)">
            <tr>
                <th class="px-6 py-4 text-left text-white">ID</th>
                <th class="px-6 py-4 text-left text-white">Kategori</th>
                <th class="px-6 py-4 text-left text-white">Harga</th>
                <th class="px-6 py-4 text-left text-white">Stok</th>
                <th class="px-6 py-4 text-left text-white">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tikets as $tiket)
                <tr class="border-t border-gray-200 hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm" style="color: var(--color-navy)">{{ $tiket->id_tiket }}</td>
                    <td class="px-6 py-4 text-sm" style="color: var(--color-navy)">{{ $tiket->kategori }}</td>
                    <td class="px-6 py-4 text-sm font-semibold" style="color: var(--color-gold)">Rp {{ number_format($tiket->harga, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-sm">
                        <span class="px-3 py-1 rounded-full text-white text-xs font-semibold" style="background-color: {{ $tiket->stok > 0 ? 'var(--color-navy)' : '#dc3545' }}">
                            {{ $tiket->stok }} {{ $tiket->stok > 0 ? 'tersedia' : 'habis' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm">
                        <a href="{{ route('admin.tiket.edit', $tiket->id_tiket) }}" class="inline-block px-3 py-1 text-white rounded text-xs font-semibold mr-2 transition hover:opacity-80" style="background-color: var(--color-navy)">
                            <i class="fas fa-edit mr-1"></i>Edit
                        </a>
                        <form action="{{ route('admin.tiket.destroy', $tiket->id_tiket) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus tiket ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-block px-3 py-1 bg-red-600 text-white rounded text-xs font-semibold transition hover:bg-red-700">
                                <i class="fas fa-trash mr-1"></i>Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                        Tidak ada tiket. <a href="{{ route('admin.tiket.create') }}" class="font-semibold" style="color: var(--color-gold)">Tambah tiket sekarang</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
