<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategory extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category1 =  Category::create([
            'name' => 'Electronics',
        ]);
        $category2 =  Category::create([
            'name' => 'Mobile',
        ]);
        $product1 = Product::create([
            'name' => "laptop",
            'price' => 1000,
            'description' => "A laptop is a computer that you can take with you and use in different places where there is no power supply.",
        ]);

        $product2 = Product::create([
            'name' => "smartphone",
            'price' => 500,
            'description' => "A smartphone is a mobile phone that can do more than other phones. They work as a computer but are mobile devices small enough to fit in a user's hand.",
        ]);

        $product1->categories()->attach($category1->id);
        $product2->categories()->attach($category2->id);
    }
}