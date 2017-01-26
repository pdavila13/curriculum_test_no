<?php

use Illuminate\Database\Seeder;
use Scool\Curriculum\Models\Study;

class StudiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 5)->create()->each(function ($user) {
            $user->studies()->saveMany(
                factory(Study::class, 10)->create(['user_id' => $user->id])
            );
        });
    }
}
