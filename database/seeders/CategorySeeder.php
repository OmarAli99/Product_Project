<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
               $categories = ['Laptops','pcs','Scanner','screens'];
               foreach( $categories as $category)
               Category::create([
                'name' => $category,
                'subcategory_id' => null 
            ]);
    }
}
