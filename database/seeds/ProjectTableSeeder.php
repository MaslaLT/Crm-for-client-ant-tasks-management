<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'name' => 'CodeAcademy',
            'description' => 'Programavimo mokykla',
            'created_at' => date("Y-m-d") .' '. date("h:i:s"),
            'updated_at' => date("Y-m-d") .' '. date("h:i:s"),
            'project_owner_id' => 1,
            'hourly_rate' => 45.99,
            'url' => 'https://www.codeacademy.lt',
            'admin_url' => 'https://www.codeacademy.lt/admin',
            'login_details' => 'Bla bla and you loged in',
            'git_url' => 'www.github.com',
            'logo_url' => 'www.google.com/logo',
            'system_type' => 'WP',
            'details_id' => 1
    ]);
    }
}
