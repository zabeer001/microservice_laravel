<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'title' => 'Product 1',
                'image' => 'product1.jpg',
                'likes' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Product 2',
                'image' => 'product2.jpg',
                'likes' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Product 3',
                'image' => 'product3.jpg',
                'likes' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
