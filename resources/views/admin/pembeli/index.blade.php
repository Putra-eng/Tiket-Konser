@extends('layouts.admin')

@section('title', 'Pembeli')
@section('page_title', 'Data Pembeli')

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
        <p class="text-gray-600">Total pembeli: <span class="font-semibold" style="color: var(--color-gold)">{{ $pembeli->count() }}</span></p>
    </div>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <table class="w-full">
        <thead style="background-color: var(--color-navy)">
            <tr>
                <th class="px-6 py-4 text-left text-white">ID</th>
                <th class="px-6 py-4 text-left text-white">Nama</th>
                <th class="px-6 py-4 text-left text-white">Nomor Telepon</th>
                <th class="px-6 py-4 text-left text-white">Tanggal Terdaftar</th>
                <th class="px-6 py-4 text-left text-white">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pembeli as $item)
                <tr class="border-t border-gray-200 hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm" style="color: var(--color-navy)">{{ $item->id_pembeli }}</td>
                    <td class="px-6 py-4 text-sm" style="color: var(--color-navy)">{{ $item->nama }}</td>
                    <td class="px-6 py-4 text-sm" style="color: var(--color-navy)">{{ $item->no_hp }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $item->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4 text-sm">
                        <form action="{{ route('admin.pembeli.destroy', $item->id_pembeli) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus data pembeli ini?');">
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
                        Belum ada data pembeli
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
