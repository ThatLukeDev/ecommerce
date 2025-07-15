<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create();
        Product::factory()->count(50)->create();
        User::factory(2)->admin()->create();
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.net',
            'password' => Hash::make('admin'),
            'permission' => 1,
        ]);
    }
}
