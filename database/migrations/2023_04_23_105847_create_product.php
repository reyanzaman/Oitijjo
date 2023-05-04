<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('seller')->insert([
            [
                'name' => 'Seller Name',
                'address' => '123 Main Street',
                'contact' => '123-456-7890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Another Seller',
                'address' => '456 Second Ave',
                'contact' => '555-555-5555',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('product')->insert([
            [
                'name' => 'Product One',
                'price' => 10.99,
                'description' => 'This is a description of Product One',
                'seller_id' => 1,
                'length' => 10.5,
                'width' => 5.25,
                'height' => 2.0,
                'stock' => 100,
                'model' => 'Model 1',
                'image1' => 'image1.jpg',
                'image2' => 'image2.jpg',
                'image3' => 'image3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Product Two',
                'price' => 15.99,
                'description' => 'This is a description of Product Two',
                'seller_id' => 2,
                'length' => 12.0,
                'width' => 6.0,
                'height' => 3.0,
                'stock' => 50,
                'model' => 'Model 2',
                'image1' => 'image1.jpg',
                'image2' => 'image2.jpg',
                'image3' => 'image3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Product Three',
                'price' => 25.99,
                'description' => 'This is a description of Product Three',
                'seller_id' => 1,
                'length' => 8.5,
                'width' => 4.25,
                'height' => 1.5,
                'stock' => 200,
                'model' => 'Model 3',
                'image1' => 'image1.jpg',
                'image2' => 'image2.jpg',
                'image3' => 'image3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

