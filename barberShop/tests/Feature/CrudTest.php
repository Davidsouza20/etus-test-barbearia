<?php

namespace Tests\Feature;

use App\Client;
use App\Employee;
use App\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CrudTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * Create tests.
     *
     * @return void
     */
    public function test_is_possible_to_create_employee_client_and_service()
    {
        $this->withExceptionHandling();

        $employee_attribute = [
            "name" => $this->faker->name,
            "email"=> $this->faker->email,
            "employee_type"=> $this->faker->randomDigit
        ];

        $client_attribute = [
            "name" => $this->faker->name,
            "email"=> $this->faker->email,
            "phone"=> $this->faker->phoneNumber
        ];

        $employee = $this->post('/employee', $employee_attribute);
        $this->assertDatabaseHas('employees', $employee_attribute);

        $client = $this->post('/client', $client_attribute);
        $this->assertDatabaseHas('clients', $client_attribute);

        $service_attribute = [
            "client_id" => Client::first()['id'],
            "employee_id" => Employee::first()['id'],
            "scheduled_date"=> $this->faker->date(),
            "scheduled_hour" => $this->faker->time(),
            "service_type" => $this->faker->sentence,
        ];

        $service = $this->post('/service', $service_attribute);
        $this->assertDatabaseHas('services', $service_attribute);

        $this->assertArrayHasKey('employee', $employee['data']);
        $this->assertArrayHasKey('client', $client['data']);
        $this->assertArrayHasKey('service', $service['data']);

    }

    /**
     * Update tests.
     *
     * @return void
     */

   public function test_is_possible_update_employee_client_and_service() {
        $this->withExceptionHandling();

        $employee_attribute = [
            "name" => $this->faker->name,
            "email"=> $this->faker->email,
            "employee_type"=> $this->faker->randomDigit
        ];

        $client_attribute = [
            "name" => $this->faker->name,
            "email"=> $this->faker->email,
            "phone"=> $this->faker->phoneNumber
        ];

        $employee = $this->post('/employee', $employee_attribute);
        $this->assertDatabaseHas('employees', $employee_attribute);

        $this->post('/client', $client_attribute);
        $client = $this->put('/client/'.Client::first()['id'], $client_attribute);
        $this->assertDatabaseHas('clients', $client_attribute);

       $service_attribute = [
           "client_id" => Client::first()['id'],
           "employee_id" => Employee::first()['id'],
           "scheduled_date"=> $this->faker->date(),
           "scheduled_hour" => $this->faker->time(),
           "service_type" => $this->faker->sentence,
       ];

        $this->post('/service', $service_attribute);
        $service = $this->put('/service/'.Service::first()['id'], $service_attribute);
        $this->assertDatabaseHas('services', $service_attribute);

        $this->assertArrayHasKey('employee', $employee['data']);
        $this->assertArrayHasKey('client', $client['data']);
        $this->assertArrayHasKey('service', $service['data']);
   }

    /**
     * Update tests.
     *
     * @return void
     */
   public function test_is_possible_to_delete_employee_client_and_service() {
       $this->withExceptionHandling();
       $client = factory('App\Client')->create();
       $this->delete('/client/'.$client->id);
       $this->assertDatabaseMissing('clients', ['id' => $client->id]);

       $service = factory('App\Service')->create();
       $this->delete('/service/'.$service->id);
       $this->assertDatabaseMissing('services', ['id' => $service->id]);
   }
}
