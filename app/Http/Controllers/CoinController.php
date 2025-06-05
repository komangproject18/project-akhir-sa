<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use Illuminate\Http\Request;

class CoinController extends Controller
{
    public function showForm()
    {
        return view('coin.index');
    }

    public function makeChange(Request $request)
    {
        $request->validate([
            'amount' => 'required|integer|min:1'
        ]);

        $amount = $request->amount;
        $coins = Coin::orderByDesc('value')->pluck('value')->toArray();

        $result = [];
        foreach ($coins as $coin) {
            while ($amount >= $coin) {
                $amount -= $coin;
                $result[] = $coin;
            }
        }

        return view('coin.hasil', ['coinsUsed' => $result]);
    }
}
