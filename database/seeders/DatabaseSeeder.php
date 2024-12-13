<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::create([
                'name' =>'admin',
                'email' =>'admin@saas.com',
                'password' => Hash::make('12345'),
        ]);

        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(SalesSeeder::class);
}
}