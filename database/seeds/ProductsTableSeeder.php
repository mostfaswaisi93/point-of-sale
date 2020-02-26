<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = ['Product One', 'Product Two'];
        foreach ($products as $product) {
            Product::create([
                'category_id' => 1,
                'ar' => ['name' => $product, 'description' => $product . ' desc'],
                'en' => ['name' => $product, 'description' => $product . ' desc'],
                'purchase_price' => 28,
                'sale_price' => 30.25,
                'stock' => 150,
            ]);
        }
        foreach ($products as $product) {
            Product::create([
                'category_id' => 2,
                'ar' => ['name' => $product, 'description' => $product . ' desc'],
                'en' => ['name' => $product, 'description' => $product . ' desc'],
                'purchase_price' => 95,
                'sale_price' => 100.25,
                'stock' => 120,
            ]);
        }
        foreach ($products as $product) {
            Product::create([
                'category_id' => 3,
                'ar' => ['name' => $product, 'description' => $product . ' desc'],
                'en' => ['name' => $product, 'description' => $product . ' desc'],
                'purchase_price' => 25,
                'sale_price' => 32,
                'stock' => 70,
            ]);
        }
    }
}
