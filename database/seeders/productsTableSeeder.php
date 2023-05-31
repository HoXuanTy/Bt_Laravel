<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Faker\Factory as faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class productsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        $faker = Faker::create();

        $limit= 100;
        for($i=0;$i < $limit;$i++){
            DB::table('products')->insert([

                'name' => $faker->name,
                'price' => $faker->randomFloat(2, 0, 1000),
                'image' => $faker->imageUrl(),
                'cate_id' => $faker->randomNumber(),
             
            ]);

        }
        //  DB::table('products')->insert([

        //         'name' => 'ty',
        //         'price' => 10,
        //         'image' => "book.jpg",
        //         'cate_id' => 2,
             
        //     ]);

    }
}
