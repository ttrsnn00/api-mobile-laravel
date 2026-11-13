<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'total_price' => 'required|integer',
            'items' => 'required|array',
            'items.*.plant_id' => 'required|exists:plants,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|integer',
        ]);

        try {
            DB::beginTransaction();

            // Buat Order
            $order = Order::create([
                'user_id' => $request->user()->id,
                'total_price' => $request->total_price,
                'status' => 'pending',
            ]);

            // Buat Order Items
            foreach ($request->items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'plant_id' => $item['plant_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);

                // Opsional: Kurangi stok tanaman di sini jika diperlukan
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Pesanan berhasil dibuat',
                'order_id' => $order->id
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat pesanan: ' . $e->getMessage()
            ], 500);
        }
    }
    public function index(Request $request)
    {
        // Mengambil semua pesanan milik user yang sedang login
        // 'with' digunakan untuk mengambil relasi item pesanan dan data tanamannya sekaligus (Eager Loading)
        $orders = Order::with(['items.plant'])
            ->where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc') // Urutkan dari yang terbaru
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Riwayat pesanan berhasil diambil',
            'data' => $orders
        ], 200);
    }
}
