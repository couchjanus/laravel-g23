<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'shoes', 'status' => true],
            ['name' => 'watches', 'status' => false],
            ['name' => 'gadgets', 'status' => true],
            ['name' => 'electronics', 'status' => true],
        ];

        foreach ($categories as $category){
            \DB::table('categories')->insert([
                'name' => $category['name'],
                'status' => $category['status'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
