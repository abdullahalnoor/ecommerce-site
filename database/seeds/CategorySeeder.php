<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $category =  DB::table('categories')->insert([
            'name' => 'Gents',
            'slug' => 'gents',
            'type' => 1,
        ]);
        $category =  DB::table('category_parents')->insert([
            'category_id' =>Category::orderBy('id','desc')->first()->id,
            'parent_id' => 0,
        ]);
        $category =  DB::table('categories')->insert([
            'name' => 'Ladies',
            'slug' => 'ladies',
            'type' => 1,
        ]);
        $category =  DB::table('category_parents')->insert([
            'category_id' =>Category::orderBy('id','desc')->first()->id,
            'parent_id' => 0,
        ]);
        $category =  DB::table('categories')->insert([
            'name' => 'Accessories',
            'slug' => 'accessories',
            'type' => 1,
        ]);
        $category =  DB::table('category_parents')->insert([
            'category_id' =>Category::orderBy('id','desc')->first()->id,
            'parent_id' => 0,
        ]);

            // general category
        $category =  DB::table('categories')->insert([
            'name' => 'Bag',
            'slug' => 'bag',
            'type' => 2,
        ]);
        $category =  DB::table('categories')->insert([
            'name' => 'Watch',
            'slug' => 'watch',
            'type' => 2,
        ]);
        $category =  DB::table('categories')->insert([
            'name' => 'Shirt',
            'slug' => 'shirt',
            'type' => 2,
        ]);
        $category =  DB::table('categories')->insert([
            'name' => 'Pants',
            'slug' => 'pants',
            'type' => 2,
        ]);
        $category =  DB::table('categories')->insert([
            'name' => 'Ganji',
            'slug' => 'ganji',
            'type' => 2,
        ]);
        $category =  DB::table('categories')->insert([
            'name' => 'Blajer',
            'slug' => 'blajer',
            'type' => 2,
        ]);
        $category =  DB::table('categories')->insert([
            'name' => 'Jacket',
            'slug' => 'jacket',
            'type' => 2,
        ]);
        $category =  DB::table('categories')->insert([
            'name' => 'Sweater',
            'slug' => 'sweater',
            'type' => 2,
        ]);
        $category =  DB::table('categories')->insert([
            'name' => 'Hoddie',
            'slug' => 'hoddie',
            'type' => 2,
        ]);
        $category =  DB::table('categories')->insert([
            'name' => 'Cap',
            'slug' => 'cap',
            'type' => 2,
        ]);
        $category =  DB::table('categories')->insert([
            'name' => 'Panjabi',
            'slug' => 'panjabi',
            'type' => 2,
        ]);
        $category =  DB::table('categories')->insert([
            'name' => 'Shoes',
            'slug' => 'shoes',
            'type' => 2,
        ]);
    }
}
