<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $p_name_st[0] = ['ACER筆電','宏碁'];
        $p_name_st[1] = ['ASUS筆電','華碩'];
        $p_name_st[2] = ['MSI筆電','微星'];
        $random_int_s = random_int(0,2);

        return [
            'p_name' => $p_name_st[$random_int_s][0],
            'p_label' => $p_name_st[$random_int_s][1],
            'o_price' => random_int(30000,60000),
            'a_price' => random_int(30000,60000),
        ];
    }
}
