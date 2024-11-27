<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Product::class, function (Faker $faker) {
    $name = $faker->sentence;
    return [
        'name' =>$name,
        'slug' => Str::slug($name,'-'),
        'product_type' => rand(1,2),
        'featured' => rand(0,1),
        'new' => rand(0,1),
        'description' => $faker->paragraph,
        'sales_price' => $faker->numberBetween(5,8000),
        'thumbnail' => 'frontend/images/placeholder-product.png'
    ];
});
