<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sales;
use App\Models\category;
use Illuminate\Support\Facades\DB;

class SalesSeeder extends Seeder
{
    public function run()
    {
        // Clear existing sales data
        DB::table('sales')->truncate();

        $categories = category::all();

        // Generate random sales data
        foreach ($categories as $category) {
            for ($i = 0; $i < 100; $i++) {
                Sales::create([
                    'category_id' => $category->id,
                    'product_name' => 'Product ' . rand(1, 50),
                    'amount' => rand(20, 500), // Random sales amount
                    'created_at' => now()->subDays(rand(0, 30))->startOfDay()->addHours(rand(0, 23)),
                ]);
            }
        }
    }
}
