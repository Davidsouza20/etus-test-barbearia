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
            'name' => 'John Doe',
            'email' => 'professional@test.com',
            'employee_type' => 1
        ]);
        
        //Create services for professional as example
        factory(\App\Service::class, 10)->create([
            'employee_id'=> 1
        ]);


        //Create first manager
        DB::table('employees')->insert([
            'name' => 'Jane Smith',
            'email' => 'manager@test.com',
            'employee_type' => 2
        ]);

        //Create example services
        factory(\App\Service::class, 100)->create();
    }
}
