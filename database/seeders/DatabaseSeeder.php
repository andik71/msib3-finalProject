<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $products = [
            [
                'code' => 'SM01',
                'name' => 'Iphone 13',
                'desc' => 'Iphone 2021',
                'price' => '3000000',
                'stok' => '100',
                'sold' => '50',
                'photo' => '',
                'category_id' => '1',
                'store_id' => '1',
            ],
            [
                'code' => 'LP01',
                'name' => 'Asus Rog Strix',
                'desc' => 'Asus Rog 2022',
                'price' => '50000000',
                'stok' => '20',
                'sold' => '10',
                'photo' => '',
                'category_id' => '2',
                'store_id' => '2',
            ],
            [
                'code' => 'PC01',
                'name' => 'HP Gl 05',
                'desc' => 'HP PC All In One',
                'price' => '10000000',
                'stok' => '120',
                'sold' => '30',
                'photo' => '',
                'category_id' => '3',
                'store_id' => '3',
            ],
        ];

        $category = [
            [
                'name' => 'Smartphone',
                'photo' => ''
            ],
            [
                'name' => 'Laptop',
                'photo' => ''
            ],
            [
                'name' => 'PC All In One',
                'photo' => ''
            ]
        ];

        $store = [
            [
                'name' => 'pstore',
                'location' => 'jakarta',
                'rating' => '4.5'
            ],
            [
                'name' => 'studio ponsel',
                'location' => 'depok',
                'rating' => '4.9'
            ],
            [
                'name' => 'wah gadget',
                'location' => 'bekasi',
                'rating' => '4.7'
            ],
        ];

        Category::insert($category);
        Store::insert($store);
        Product::insert($products);
    }
}
