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
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function premium($id)
    {
        $item = Product::findOrFail($id);
        $orderId = 'PREM-' . $item->id . '-' . time();
        
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => (int) $item->price,
            ],
            'customer_details' => [
                'first_name' => 'Pelanggan',
                'email' => 'customer@example.com',
            ],
        ];

        $snapToken = Snap::getSnapToken($params);
        return view('checkout', compact('snapToken', 'item'));
    }

    public function sosmed($id)
    {
        $item = Sosmed::findOrFail($id);
        $orderId = 'SOS-' . $item->id . '-' . time();
        
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => (int) $item->harga,
            ],
            // TAMBAHAN WAJIB AGAR MIDTRANS TIDAK ERROR
            'customer_details' => [
                'first_name' => 'Pelanggan Sosmed',
                'email' => 'customer@example.com',
            ],
        ];

        $snapToken = Snap::getSnapToken($params);
        return view('checkout', compact('snapToken', 'item'));
    }

    public function game($id)
    {
        $item = Game::findOrFail($id);
        $orderId = 'GAME-' . $item->id . '-' . time();
        
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => (int) $item->harga,
            ],
            // TAMBAHAN WAJIB
            'customer_details' => [
                'first_name' => 'Gamer',
                'email' => 'customer@example.com',
            ],
        ];

        $snapToken = Snap::getSnapToken($params);
        return view('checkout', compact('snapToken', 'item'));
    }
}