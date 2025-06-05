<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProduksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produks = [
            ['name' => 'Laptop', 'weight' => 3, 'value' => 2000],
            ['name' => 'Buku', 'weight' => 1, 'value' => 300],
            ['name' => 'Baju', 'weight' => 2, 'value' => 500],
            ['name' => 'Kamera', 'weight' => 2, 'value' => 1500],
            ['name' => 'Smartphone', 'weight' => 1, 'value' => 1000],
            ['name' => 'Semangka', 'weight' => 3, 'value' => 450],
            ['name' => 'Sepatu', 'weight' => 1, 'value' => 600],
            ['name' => 'Kompor Portable', 'weight' => 2, 'value' => 1500],
            ['name' => 'Kacamata', 'weight' => 1, 'value' => 700],
        ];

        foreach ($produks as $produk) {
            Produk::create($produk);
        }
    }
}
