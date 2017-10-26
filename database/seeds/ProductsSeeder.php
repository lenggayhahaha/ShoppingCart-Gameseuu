<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        	'product_name' => 'Hunger Games',
        	'product_price' => '10',
        	'imagePath' => 'game.png',
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s"),
        	]);

        DB::table('products')->insert([
        	'product_name' => 'Dork Diaries',
        	'product_price' => '8',
        	'imagePath' => 'circus.png',
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s"),
        	]);

        DB::table('products')->insert([
        	'product_name' => 'Divergent',
        	'product_price' => '15',
        	'imagePath' => 'cabin.png',
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s"),
        	]);

        DB::table('products')->insert([
        	'product_name' => 'Life of Pi',
        	'product_price' => '203',
        	'imagePath' => 'cake.png',
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s"),
        	]);

        DB::table('products')->insert([
        	'product_name' => 'Harry Potter',
        	'product_price' => '170',
        	'imagePath' => 'safe.png',
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s"),
        	]);

        DB::table('products')->insert([
        	'product_name' => 'World War Z',
        	'product_price' => '203',
        	'imagePath' => 'submarine.png',
        	'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s"),
        	]);
    }
}
