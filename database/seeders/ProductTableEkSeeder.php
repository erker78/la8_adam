<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
class ProductTableEkSeeder extends Seeder
{
    public function run()
    {
        Product::factory(10)->create();
    }
}
