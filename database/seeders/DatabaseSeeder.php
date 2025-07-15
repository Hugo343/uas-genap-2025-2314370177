<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Elektronik', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Fashion', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Peralatan Rumah', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('products')->insert([
            [
                'name' => 'Smartphone Android',
                'description' => 'HP Android murah dan canggih.',
                'price' => 2500000,
                'category_id' => 1,
                'is_publish' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kemeja Pria',
                'description' => 'Kemeja lengan panjang bahan adem.',
                'price' => 125000,
                'category_id' => 2,
                'is_publish' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Blender',
                'description' => 'Blender serbaguna untuk dapur.',
                'price' => 450000,
                'category_id' => 3,
                'is_publish' => false,
                'published_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Celana Jeans',
                'description' => 'Celana jeans pria kekinian.',
                'price' => 199000,
                'category_id' => 2,
                'is_publish' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mesin Cuci',
                'description' => 'Mesin cuci 2 tabung 7 kg.',
                'price' => 1500000,
                'category_id' => 3,
                'is_publish' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
