<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            "notebook" => " Used for writing ",
            "pen" => " Stationary ",
            "watch" => " Used to see time "
        ];

        foreach ($products as $key => $value) {
            category::create([
                "name" => $key,
                "context" => $value
            ]);
        }
    }
}
