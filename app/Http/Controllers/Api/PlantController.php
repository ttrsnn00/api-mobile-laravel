<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function index(Request $request)
    {
        // Opsional: Jika Anda ingin menambahkan filter berdasarkan kategori dari sisi backend
        $query = Plant::query();

        if ($request->has('category') && $request->category !== 'Semua') {
            $query->where('category', $request->category);
        }

        $plants = $query->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar Tanaman berhasil diambil',
            'data' => $plants
        ], 200);
    }
}
