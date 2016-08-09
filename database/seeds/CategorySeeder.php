<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('categories')->insert([
            'title' => 'Vàng',
            'parent_id' => '1',
            'slug' => 'vang'
        ]);
    }
}
// php artisan make:seeder CategorySeeder
// php artisan db:seed
// php artisan db:seed --class=UserTableSeeder