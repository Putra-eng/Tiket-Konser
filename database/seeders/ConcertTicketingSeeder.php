<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ConcertTicketingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin')->insert([
            'nama' => 'Admin Concert',
            'email' => 'admin@concert.com',
            'password' => Hash::make('password123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $tikets = [
            [
                'kategori' => 'VVIP',
                'harga' => 500000,
                'stok' => 50,
            ],
            [
                'kategori' => 'VIP',
                'harga' => 250000,
                'stok' => 200,
            ],
            [
                'kategori' => 'Regular',
                'harga' => 100000,
                'stok' => 500,
            ],
        ];

        foreach ($tikets as $tiket) {
            $tiket['created_at'] = now();
            $tiket['updated_at'] = now();
            DB::table('tiket')->insert($tiket);
        }

        $pembeli_data = [
            ['nama' => 'Khotami', 'no_hp' => '081234567890'],
            ['nama' => 'Hafzi', 'no_hp' => '082345678901'],
            ['nama' => 'Zaki', 'no_hp' => '083456789012'],
            ['nama' => 'Robby Panjoro', 'no_hp' => '084567890123'],
            ['nama' => 'Siapa nyakk', 'no_hp' => '085678901234'],
        ];

        foreach ($pembeli_data as $pembeli) {
            $pembeli['created_at'] = now();
            $pembeli['updated_at'] = now();
            DB::table('pembeli')->insert($pembeli);
        }

        $pemesanan_data = [
            ['id_pembeli' => 1, 'id_tiket' => 1, 'jumlah' => 2, 'total_harga' => 1000000],
            ['id_pembeli' => 2, 'id_tiket' => 2, 'jumlah' => 4, 'total_harga' => 1000000],
            ['id_pembeli' => 3, 'id_tiket' => 3, 'jumlah' => 5, 'total_harga' => 500000],
            ['id_pembeli' => 4, 'id_tiket' => 1, 'jumlah' => 1, 'total_harga' => 500000],
            ['id_pembeli' => 5, 'id_tiket' => 2, 'jumlah' => 3, 'total_harga' => 750000],
        ];

        foreach ($pemesanan_data as $pemesanan) {
            $pemesanan['created_at'] = now();
            $pemesanan['updated_at'] = now();
            DB::table('pemesanan')->insert($pemesanan);
        }
    }
}
