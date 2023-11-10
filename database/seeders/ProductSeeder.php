<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productItems = [
            [
                'title' => 'Black Cape',
                'description' => '...',
                'price' => 799,
                'quantity' => 150,
                'published' => true,
            ],
            [
                'title' => 'Union Jack Bow Tie',
                'description' => '...',
                'price' => 25,
                'quantity' => 150,
                'published' => true,
            ],
            [
                'title' => 'Belt Black Leather',
                'description' => '...',
                'price' => 25,
                'quantity' => 150,
                'published' => true,
            ],
            [
                'title' => 'Brown Brogue Shoe',
                'description' => '...',
                'price' => 25,
                'quantity' => 150,
                'published' => true,
            ],
            [
                'title' => 'Pink Braces',
                'description' => '...',
                'price' => 25,
                'quantity' => 150,
                'published' => true,
            ],
            [
                'title' => 'Dress Black',
                'description' => '...',
                'price' => 25,
                'quantity' => 150,
                'published' => true,
            ],
            [
                'title' => 'Baseball Cap',
                'description' => '...',
                'price' => 25,
                'quantity' => 150,
                'published' => true,
            ],
            [
                'title' => 'Rasta Winter Hat',
                'description' => '...',
                'price' => 25,
                'quantity' => 150,
                'published' => true,
            ],
            [
                'title' => 'Green and Blue Clogs',
                'description' => '...',
                'price' => 25,
                'quantity' => 150,
                'published' => true,
            ]
        ];
        
        foreach ($productItems as $product) {
            $slug = Str::slug($product['title']);

            Product::create([
                'title' => $product['title'],
                'slug' => $slug,
                'created_by' => 1,
                'published' => $product['published'], 
            ]);
        }
    }
}
