<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = ['Category One', 'Category Two', 'Category Three'];
        foreach ($categories as $category) {
            Category::create([
                'ar' => ['name' => $category],
                'en' => ['name' => $category],
            ]);
        }
    }
}
