<?php

use Illuminate\Database\Seeder;

class DrinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('drinks')->insert([
            'servings' => '2',
            'caffeine_mg' => '75',
            'drink_name' => 'Monster Ultra Sunrise'
        ]);

        DB::table('drinks')->insert([
            'servings' => '1',
            'caffeine_mg' => '95',
            'drink_name' => 'Black Coffee'
        ]);

        DB::table('drinks')->insert([
            'servings' => '1',
            'caffeine_mg' => '77',
            'drink_name' => 'Americano'
        ]);

        DB::table('drinks')->insert([
            'servings' => '2',
            'caffeine_mg' => '130',
            'drink_name' => 'Sugar free NOS'
        ]);

        DB::table('drinks')->insert([
            'servings' => '1',
            'caffeine_mg' => '200',
            'drink_name' => '5 Hour Energy'
        ]);



    }
}
