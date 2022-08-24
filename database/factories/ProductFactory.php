<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{


    protected $product = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => Str::random(10),
            'product_description' => Str::random(10),
            'product_status' => Str::random(10),
            'product_price' => 50,
            'product_code' => Str::random(10),
        ];
    }
}
