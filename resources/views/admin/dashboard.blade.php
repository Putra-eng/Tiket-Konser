@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
<style>
    :root {
        --color-navy: #001F3F;
        --color-cream: #F5F5DC;
        --color-gold: #D4AF37;
    }
</style>
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total Pemesanan -->
        <div class="bg-white rounded-lg shadow-md p-6" style="border-left: 4px solid var(--color-navy)">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium" style="color: var(--color-navy)">Total Pemesanan</p>
                    <p class="text-3xl font-bold mt-2" style="color: var(--color-navy)">{{ $totalPemesanan }}</p>
                </div>
                <div class="rounded-full p-3" style="background-color: var(--color-cream)">
                    <i class="fas fa-shopping-cart text-2xl" style="color: var(--color-navy)"></i>
                </div>
            </div>
        </div>

        <!-- Total Pendapatan -->
        <div class="bg-white rounded-lg shadow-md p-6" style="border-left: 4px solid var(--color-gold)">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium" style="color: var(--color-navy)">Total Pendapatan</p>
                    <p class="text-3xl font-bold mt-2" style="color: var(--color-gold)">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
                </div>
                <div class="rounded-full p-3" style="background-color: var(--color-cream)">
                    <i class="fas fa-money-bill-wave text-2xl" style="color: var(--color-gold)"></i>
                </div>
            </div>
        </div>

        <!-- Total Tiket Terjual -->
        <div class="bg-white rounded-lg shadow-md p-6" style="border-left: 4px solid var(--color-gold)">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium" style="color: var(--color-navy)">Total Tiket Terjual</p>
                    <p class="text-3xl font-bold mt-2" style="color: var(--color-navy)">{{ $totalTiketTerjual }}</p>
                </div>
                <div class="rounded-full p-3" style="background-color: var(--color-cream)">
                    <i class="fas fa-ticket-alt text-2xl" style="color: var(--color-navy)"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Tiket Section -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold" style="color: var(--color-navy)">Daftar Tiket</h3>
                    <span class="text-sm" style="color: var(--color-gold)">{{ $tikets->count() }} tiket</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead style="background-color: var(--color-navy)">
                            <tr>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-white">Kategori</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-white">Harga</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-white">Stok</th>
                                <th class="px-4 py-3 text-center text-sm font-semibold text-white">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tikets as $tiket)
                                <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                                    <td class="px-4 py-3 text-sm font-medium" style="color: var(--color-navy)">{{ $tiket->kategori }}</td>
                                    <td class="px-4 py-3 text-sm" style="color: var(--color-gold)">Rp {{ number_format($tiket->harga, 0, ',', '.') }}</td>
                                    <td class="px-4 py-3 text-sm" style="color: var(--color-navy)">
                                        <span class="font-medium">{{ $tiket->stok }}</span>
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        @if ($tiket->stok > 0)
                                            <span class="inline-block px-3 py-1 text-xs font-semibold text-white rounded-full" style="background-color: var(--color-navy)">
                                                Tersedia
                                            </span>
                                        @else
                                            <span class="inline-block px-3 py-1 text-xs font-semibold text-white bg-red-600 rounded-full">
                                                Habis
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-6 text-center" style="color: var(--color-navy)">
                                        <i class="fas fa-inbox text-3xl mb-2 block opacity-30"></i>
                                        Tidak ada tiket
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-bold mb-4" style="color: var(--color-navy)">Ringkasan</h3>

            <div class="space-y-4">
                <div class="flex items-center justify-between p-3 rounded-lg" style="background-color: var(--color-cream)">
                    <span class="text-sm" style="color: var(--color-navy)">Rata-rata Harga Tiket</span>
                    <span class="font-semibold" style="color: var(--color-gold)">
                        Rp {{ number_format($tikets->count() > 0 ? $tikets->sum('harga') / $tikets->count() : 0, 0, ',', '.') }}
                    </span>
                </div>

                <div class="flex items-center justify-between p-3 rounded-lg" style="background-color: var(--color-cream)">
                    <span class="text-sm" style="color: var(--color-navy)">Total Stok Tiket</span>
                    <span class="font-semibold" style="color: var(--color-navy)">{{ $tikets->sum('stok') }}</span>
                </div>

                <div class="flex items-center justify-between p-3 rounded-lg" style="background-color: var(--color-cream)">
                    <span class="text-sm" style="color: var(--color-navy)">Tiket Terjual</span>
                    <span class="font-semibold" style="color: var(--color-navy)">{{ $totalTiketTerjual }}</span>
                </div>

                <div class="flex items-center justify-between p-3 rounded-lg" style="background-color: var(--color-cream)">
                    <span class="text-sm" style="color: var(--color-navy)">Total Pembeli</span>
                    <span class="font-semibold" style="color: var(--color-navy)">{{ \App\Models\Pembeli::count() }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="mt-8 bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold" style="color: var(--color-navy)">Pemesanan Terbaru</h3>
            <span class="text-sm" style="color: var(--color-gold)">10 terbaru</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead style="background-color: var(--color-navy)">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-white">Nama Pembeli</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-white">Kategori Tiket</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-white">Jumlah</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-white">Total Harga</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-white">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($recentPemesanan as $pemesanan)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                            <td class="px-4 py-3 text-sm font-medium" style="color: var(--color-navy)">{{ $pemesanan->pembeli->nama }}</td>
                            <td class="px-4 py-3 text-sm" style="color: var(--color-navy)">{{ $pemesanan->tiket->kategori }}</td>
                            <td class="px-4 py-3 text-sm" style="color: var(--color-navy)">
                                <span class="font-medium">{{ $pemesanan->jumlah }}</span>
                            </td>
                            <td class="px-4 py-3 text-sm font-semibold" style="color: var(--color-gold)">
                                Rp {{ number_format($pemesanan->total_harga, 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-3 text-sm" style="color: var(--color-navy)">
                                {{ $pemesanan->created_at->format('d M Y, H:i') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center" style="color: var(--color-navy)">
                                <i class="fas fa-inbox text-3xl mb-2 block opacity-30"></i>
                                Belum ada pemesanan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
