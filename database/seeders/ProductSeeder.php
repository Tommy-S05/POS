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
        $product1 = new Product();
        $product1->code = "0001";
        $product1->name = "Lenovo L340 Gaming";
//        $product1->stock = 0;
        $product1->image = "1675491271-Laptop-Gamer-Lenovo-Core-I7-L340.jpg";
        $product1->sell_price = 45500.00;
        $product1->category_id = 1;
        $product1->provider_id = 1;
        $product1->save();

        $product2 = new Product();
        $product2->code = "0002";
        $product2->name = "Iphone 14 Pro Max";
        $product2->image = "1675621667-iphone14-pro-max.png";
        $product2->sell_price = 115500.00;
        $product2->category_id = 2;
        $product2->provider_id = 2;
        $product2->save();
    }
}
