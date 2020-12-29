<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'name' => 'Active',
        ]);

        DB::table('statuses')->insert([
            'name' => 'History',
        ]);
    }
}
