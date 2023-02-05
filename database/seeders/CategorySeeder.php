<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = new Category();
        $category1->name = "Computadoras";
        $category1->description = "Esta categoría es para todo tipos de computadora.";
        $category1->save();

        $category2 = new Category();
        $category2->name = "Celulares";
        $category2->description = "Esta categoría es para todo tipos de celulares.";
        $category2->save();
    }
}
