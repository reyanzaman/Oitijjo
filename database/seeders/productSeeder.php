<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        INSERT INTO `seller` (`id`, `name`, `address`, `contact`, `created_at`, `updated_at`) VALUES
(1, 'Seller Name', '123 Main Street', '123-456-7890', NOW(), NOW()),
(2, 'Another Seller', '456 Second Ave', '555-555-5555', NOW(), NOW());

INSERT INTO `product` (`id`, `name`, `price`, `description`, `seller_id`, `length`, `width`, `height`, `stock`, `model`, `image1`, `image2`, `image3`, `created_at`, `updated_at`) VALUES
(1, 'Product One', 10.99, 'This is a description of Product One', 1, 10.5, 5.25, 2.0, 100, 'Model 1', 'image1.jpg', 'image2.jpg', 'image3.jpg', NOW(), NOW()),
(2, 'Product Two', 15.99, 'This is a description of Product Two', 2, 12.0, 6.0, 3.0, 50, 'Model 2', 'image1.jpg', 'image2.jpg', 'image3.jpg', NOW(), NOW()),
(3, 'Product Three', 25.99, 'This is a description of Product Three', 1, 8.5, 4.25, 1.5, 200, 'Model 3', 'image1.jpg', 'image2.jpg', 'image3.jpg', NOW(), NOW());

    }
}
