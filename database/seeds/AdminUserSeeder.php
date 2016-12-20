<?php

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            factory(App\User::class)->create([
                    "name" => "Paolo Davila",
                    "email" => "pdavila@iesebre.com",
                    "password" => bcrypt(env('ADMIN_PWD', '123456'))]
            );
        } catch (\Illuminate\Database\QueryException $exception) {
            //
        }
    }

}