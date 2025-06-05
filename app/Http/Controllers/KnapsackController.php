<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class KnapsackController extends Controller
{
    public function index()
    {
        return view('knapsack.index');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'capacity' => 'required|integer|min:1',
        ]);

        $capacity = $request->capacity;
        $products = Produk::all();

        $n = count($products);
        $W = $capacity;
        $dp = array_fill(0, $n + 1, array_fill(0, $W + 1, 0));

        // Knapsack DP
        for ($i = 1; $i <= $n; $i++) {
            $weight = $products[$i - 1]->weight;
            $value = $products[$i - 1]->value;

            for ($w = 0; $w <= $W; $w++) {
                if ($weight <= $w) {
                    $dp[$i][$w] = max($dp[$i - 1][$w], $dp[$i - 1][$w - $weight] + $value);
                } else {
                    $dp[$i][$w] = $dp[$i - 1][$w];
                }
            }
        }

        // Menelusuri kembali produk yang dipilih
        $w = $W;
        $selected = [];
        for ($i = $n; $i > 0 && $w > 0; $i--) {
            if ($dp[$i][$w] != $dp[$i - 1][$w]) {
                $selected[] = $products[$i - 1];
                $w -= $products[$i - 1]->weight;
            }
        }

        return view('knapsack.hasil', [
            'selectedProducts' => array_reverse($selected),
            'totalValue' => $dp[$n][$W],
            'capacity' => $capacity
        ]);
    }
}
