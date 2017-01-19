<?php

use Illuminate\Database\Seeder;
use Scool\Curriculum\Database\Seeds\StudyPermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminUserSeeder::class);
        $this->call(StudyPermissionSeeder::class);
    }
}
