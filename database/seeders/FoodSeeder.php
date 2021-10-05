<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Food;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Samsung Galaxy',

                'harga' => 100
            ],
            [
                'name' => 'Apple iPhone 12',

                'harga' => 500
            ],
            [
                'name' => 'Google Pixel 2 XL',

                'harga' => 400
            ],
            [
                'name' => 'LG V10 H800',

                'harga' => 200
            ]
        ];

        foreach ($products as $key => $value) {
            Food::create($value);
        }
    }
}