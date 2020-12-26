<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->insert([
            'name' => 'todos1',
            'user_id' => 1,
            'category_id' => 1,
            'status_id' => 1,
            'deadline' => '2020-12-31',
            'isImportant' => 2,
            'isStart' => 0,
            'isFinished' => 0,
            'notes' => 'apajadah',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
