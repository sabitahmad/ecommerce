<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {

        $categories = [
            'Electronics' => [
                'Smartphones & Accessories',
                'Laptops & Computers',
                'Audio & Headphones',
                'Cameras & Photography',
                'Wearable Technology',
            ],
            'Fashion' => [
                'Men\'s Clothing',
                'Women\'s Clothing',
                'Shoes & Footwear',
                'Accessories',
                'Jewelry & Watches',
            ],
            'Home & Furniture' => [
                'Furniture',
                'Home Decor',
                'Bedding & Bath',
                'Kitchen & Dining',
                'Appliances',
            ],
            'Beauty & Personal Care' => [
                'Skincare',
                'Makeup & Cosmetics',
                'Haircare',
                'Fragrances',
                'Personal Care Appliances',
            ],
            'Sports & Outdoors' => [
                'Exercise & Fitness',
                'Outdoor Recreation',
                'Sports Equipment',
                'Camping & Hiking',
                'Team Sports',
            ],
            'Books & Stationery' => [
                'Fiction & Literature',
                'Non-Fiction',
                'Children\'s Books',
                'Office Supplies',
                'Art & Craft',
            ],
            'Toys & Games' => [
                'Action Figures & Toys',
                'Board Games',
                'Puzzles',
                'Educational Toys',
                'Outdoor Play',
            ],
            'Health & Wellness' => [
                'Vitamins & Supplements',
                'Health Monitoring Devices',
                'Fitness Accessories',
                'Personal Care',
                'Wellness Books',
            ],
            'Automotive' => [
                'Car Accessories',
                'Motorcycle Gear',
                'Tools & Equipment',
                'GPS & Navigation',
                'Car Care',
            ],
            'Grocery & Gourmet' => [
                'Fresh Produce',
                'Pantry Staples',
                'Snacks & Beverages',
                'Gourmet Foods',
                'Organic & Natural',
            ],
        ];

        foreach ($categories as $category => $subcategories) {

            $category = Category::create([
                'name' => $category,
                'description' => null,
                'image' => 'category.svg',
                'slug' => Str::slug($category),
                'status' => 'active',
            ]);
            $subcategoryData = [];
            foreach ($subcategories as $subcategory) {
                $subcategoryData[] = ['name' => $subcategory, 'slug' => Str::slug($subcategory), 'status' => 'active'];
            }

            $category->children()->createMany($subcategoryData);

        }



    }
}
