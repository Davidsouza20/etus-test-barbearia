<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Create first professional
        DB::table('employees')->insert([
            'name' => 'Primeiro Profissional Cadastrado',
            'email' => 'test@test.com',
            'employee_type' => 1
        ]);

        factory(\App\Service::class, 50)->create([
            'employee_id' => 1
        ]);
        factory(\App\Service::class, 50)->create();
    }
}
