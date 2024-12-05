<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                "name"=>"Water",
                "price"=> 25,
                "quantity"=> 1,
                "type"=> "Litres",
            ],
            [
                "name"=>"Coke",
                "price"=> 30,
                "quantity"=> 1,
                "type"=> "Litres",
            ],
            [
                "name"=>"Sprite",
                "price"=> 35,
                "quantity"=> 1,
                "type"=> "Litres",
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
