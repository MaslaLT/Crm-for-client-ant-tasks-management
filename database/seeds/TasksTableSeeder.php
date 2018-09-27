<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'title' => str_random(170),
            'content' => str_random(200),
            'status_id' => 1,
            'priority_id' => 1,
            'author_id' => 1,
            'client_id' => 1,
            'project_id' => 1,
            'estimated_time' => rand(1,360),
            'spent_time' => rand(1,360),
            'billing_time' => 0,
            'start_date' => null,
            'deadline_date' => null,
            'fixed_rate' => 40
        ]);
    }
}
