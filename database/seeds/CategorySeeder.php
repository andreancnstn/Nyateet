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
            'name' => 'Web Development',
        ]);

        DB::table('categories')->insert([
            'name' => 'UI / UX',
        ]);

        DB::table('categories')->insert([
            'name' => 'Database',
        ]);

        DB::table('categories')->insert([
            'name' => 'School Work',
        ]);

        DB::table('categories')->insert([
            'name' => 'Jobs',
        ]);

        DB::table('categories')->insert([
            'name' => 'Holiday',
        ]);

        DB::table('categories')->insert([
            'name' => 'Weekend',
        ]);
    }
}
