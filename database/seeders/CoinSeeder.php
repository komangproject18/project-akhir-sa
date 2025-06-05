<?php

namespace Database\Seeders;

use App\Models\Coin;
use Illuminate\Database\Seeder;

class CoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coins = [1, 5, 10, 25, 50, 100];
        foreach ($coins as $value) {
            Coin::create(['value' => $value]);
        }
    }
}
