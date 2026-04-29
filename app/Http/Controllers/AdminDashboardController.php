<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Tiket;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
     public function index()
    {
        // Get dashboard statistics
        $totalPemesanan = Pemesanan::count();
        $totalPendapatan = Pemesanan::sum('total_harga');
        $totalTiketTerjual = Pemesanan::sum('jumlah');

        
        $tikets = Tiket::all();


        $recentPemesanan = Pemesanan::with(['pembeli', 'tiket'])
            ->latest('created_at')
            ->limit(10)
            ->get();

        return view('admin.dashboard', compact([
            'totalPemesanan',
            'totalPendapatan',
            'totalTiketTerjual',
            'tikets',
            'recentPemesanan',
        ]));
    }
}
