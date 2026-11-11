<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Menampilkan data statistik ringkas untuk Dashboard.
     */
    public function index()
    { // 1. Total User diambil dinamis dari database (Model User)
        $totalUser = (int) User::count();
        // 2. Metric lainnya menggunakan data integer bebas
        $totalRuangan     = 15;
        $totalBooking     = 42;
        $ruanganTersedia  = 8;
        // Mengirimkan data ke json
        return response()->json([
            'totalUser' => $totalUser,
            'totalRuangan' => $totalRuangan,
            'totalBooking' => $totalBooking,
            'ruanganTersedia' => $ruanganTersedia
        ]);
    }
}
