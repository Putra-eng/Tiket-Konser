@extends('layouts.admin')

@section('title', 'Pemesanan')
@section('page_title', 'Data Pemesanan')

@section('content')
<style>
    :root {
        --color-navy: #001F3F;
        --color-cream: #F5F5DC;
        --color-gold: #D4AF37;
    }
</style>

<div class="mb-6">
    <div class="flex items-center justify-between">
        <p class="text-gray-600">Total pemesanan: <span class="font-semibold" style="color: var(--color-gold)">{{ $pemesanan->count() }}</span></p>
    </div>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <table class="w-full">
        <thead style="background-color: var(--color-navy)">
            <tr>
                <th class="px-6 py-4 text-left text-white">ID</th>
                <th class="px-6 py-4 text-left text-white">Nama Pembeli</th>
                <th class="px-6 py-4 text-left text-white">Kategori Tiket</th>
                <th class="px-6 py-4 text-left text-white">Jumlah</th>
                <th class="px-6 py-4 text-left text-white">Total Harga</th>
                <th class="px-6 py-4 text-left text-white">Tanggal</th>
                <th class="px-6 py-4 text-left text-white">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pemesanan as $item)
                <tr class="border-t border-gray-200 hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm" style="color: var(--color-navy)">{{ $item->id_pemesanan }}</td>
                    <td class="px-6 py-4 text-sm" style="color: var(--color-navy)">{{ $item->pembeli->nama }}</td>
                    <td class="px-6 py-4 text-sm" style="color: var(--color-navy)">{{ $item->tiket->kategori }}</td>
                    <td class="px-6 py-4 text-sm" style="color: var(--color-navy)">{{ $item->jumlah }} tiket</td>
                    <td class="px-6 py-4 text-sm font-semibold" style="color: var(--color-gold)">Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $item->created_at->format('d M Y, H:i') }}</td>
                    <td class="px-6 py-4 text-sm">
                        <form action="{{ route('admin.pemesanan.destroy', $item->id_pemesanan) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus pemesanan ini?');">
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
                    <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                        Belum ada pemesanan
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
