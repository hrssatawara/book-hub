<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Bronze',
                'cost' => 10,
                'price' => 'price_1LaiaTSGoqr5dnBKihVA0wQZ',
                'stripe_product' => 'prod_MJLHQtR6h0otgj',
            ],
            [
                'name' => 'Silver',
                'cost' => 20,
                'price' => 'price_1LaialSGoqr5dnBKeEee9k3X',
                'stripe_product' => 'prod_MJLHchbkRNJMkp',
            ],
            [
                'name' => 'Gold',
                'cost' => 30,
                'price' => 'price_1Laib0SGoqr5dnBKnkXPQyYf',
                'stripe_product' => 'prod_MJLHiVzLQlnaiK',
            ],
            [
                'name' => 'Platinum',
                'cost' => 40,
                'price' => 'price_1LaibWSGoqr5dnBKM5V9W0bx',
                'stripe_product' => 'prod_MJLI285sAeACR2',
            ],
        ];
        foreach ($products as $product) {
            Product::create([
                'name' => $product['name'],
                'slug' => strtolower($product['name']),
                'stripe_price' => $product['price'],
                'stripe_product' => $product['stripe_product'],
                'cost' => $product['cost'],
            ]);
        }
    }
}
