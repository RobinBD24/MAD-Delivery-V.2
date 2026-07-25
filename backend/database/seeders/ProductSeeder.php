<?php
namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $data = require __DIR__ . '/../../data/menu_data.php';

        // Seed Cheez! Pizza products
        foreach ($data['cheez_pizza'] as $item) {
            Product::create([
                'name' => $item['name'],
                'slug' => $item['slug'],
                'category' => $item['category'],
                'price' => $item['price'],
                'description' => $item['desc'],
                'image_path' => $item['image'],
                'is_available' => true,
            ]);
        }

        // Seed Madchef products
        foreach ($data['madchef'] as $item) {
            Product::create([
                'name' => $item['name'],
                'slug' => $item['slug'],
                'category' => $item['category'],
                'price' => $item['price'],
                'description' => $item['desc'],
                'image_path' => $item['image'],
                'is_available' => true,
            ]);
        }
    }
}
