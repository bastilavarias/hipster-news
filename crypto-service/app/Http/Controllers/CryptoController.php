<?php

namespace App\Http\Controllers;

use App\Models\Crypto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CryptoController extends Controller
{
    public function generateData(Request $request) {
        $cryptos = Http::withHeaders([
            "Accept" => "application/json",
        ])
            ->get(
                "https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=100&page=1&sparkline=false",
            )
            ->json();

        foreach ($cryptos as $crypto) {
            Crypto::create([
                'symbol' => $crypto['symbol'],
                'name' => $crypto['name'],
                'image' => $crypto['image'],
                'current_price' => $crypto['current_price'],
                'market_cap' => $crypto['market_cap'],
                'market_cap_rank' => $crypto['market_cap_rank'],
                'total_volume' => $crypto['total_volume'],
                'high_24h' => $crypto['high_24h'],
                'low_24h' => $crypto['low_24h'],
                'price_change_24h' => $crypto['price_change_24h'],
                'price_change_percentage_24h' => $crypto['price_change_percentage_24h'],
                'market_cap_change_24h' => $crypto['market_cap_change_24h'],
                'market_cap_change_percentage_24h' => $crypto['market_cap_change_percentage_24h'],
                'circulating_supply' => $crypto['circulating_supply'],
                'total_supply' => $crypto['total_supply'],
                'max_supply' => $crypto['max_supply'],
            ]);
        }
        return response()->json(Crypto::all());
    }

    public function index(Request $request) {

        $paginated = $request->get('per_page', NULL);

        $data = Crypto::query();

        $data = $data->when($paginated,
            function ($query) use ($paginated) {
                return $query->paginate($paginated);
            },
            function ($query) {
                return $query->get();
            }
        );

        return response()->json($data);
    }
}
