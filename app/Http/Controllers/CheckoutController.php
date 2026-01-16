<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sosmed;
use App\Models\Game;
use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    public function __construct()
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function premium($id)
    {
        $item = Product::findOrFail($id);
        
        // Buat Order ID Unik (Misal: PREM-1, PREM-2)
        $orderId = 'PREM-' . $item->id . '-' . time();
        
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $item->price,
            ],
            'customer_details' => [
                'first_name' => 'Pelanggan',
                'email' => 'customer@example.com', // Bisa diganti dinamis nanti
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('checkout', compact('snapToken', 'item'));
    }

    public function sosmed($id)
    {
        $item = Sosmed::findOrFail($id);
        
        // Buat Order ID Unik (Misal: SOS-1-12345)
        $orderId = 'SOS-' . $item->id . '-' . time();
        
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $item->harga,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('checkout', compact('snapToken', 'item'));
    }

    public function game($id)
    {
        $item = Game::findOrFail($id);
        
        // Buat Order ID Unik (Misal: GAME-1-12345)
        $orderId = 'GAME-' . $item->id . '-' . time();
        
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $item->harga,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('checkout', compact('snapToken', 'item'));
    }
}