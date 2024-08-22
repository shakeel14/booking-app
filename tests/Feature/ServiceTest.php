<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Service;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
     public function setUp(): void
    {   
        parent::setUp();

        // Seed the database with the default or specific seeder
        $this->seed(); // Or use $this->seed(YourSpecificSeeder::class);
    }
    public function test_list_services(): void
    {
        
        $response = $this->getJson('/api/v1/services');

        $response->assertStatus(200);
       // $response->assertSee('No service found');
    }

    public function test_show_services(): void
    {
        $service = Service::factory()->create();
        $response = $this->getJson('/api/v1/services/'.$service->id);

        $response->assertStatus(200);
     //   $response->assertSee('No service found');
    }

    public function test_show_service(): void
    {
        $service = Service::factory()->create();
        $response = $this->getJson('/api/v1/services/'.$service->id);

        $response->assertStatus(200);
     //   $response->assertSee('No service found');
    }

    public function test_create_service(): void
    {
        // Define the data to be sent in the POST request
        $data = [
            'name' => 'New Service 1',
            'description' => 'Description of the new service 1',
            'price' => 100
        ];

        $response = $this->postJson('/api/v1/services', $data);
        $response->assertStatus(201);

        // $this->assertDatabaseHas('services', [
        //     'name' => 'New Service 1',
        //     'description' => 'Description of the new service 1',
        // ]);
    }


    public function test_delete_service(): void
    {
        // Define the data to be sent in the POST request
        $service = Service::factory()->create();

        // Send a DELETE request to the API endpoint
        $response = $this->deleteJson('/api/v1/services/' . $service->id);

        // Assert the response status is 204 No Content
        $response->assertStatus(204);

    }


    public function test_update_service(): void
    {
        // Define the data to be sent in the POST request
        $data = [
            'name' => 'New Service 2',
            'description' => 'Description of the new service 2',
            'price' => 100
        ];

        $service = Service::factory()->create($data);


        $data = [
            'name' => 'New Service 3',
            'description' => 'Description of the new service 3',
            'price' => 200
        ];

        $response = $this->putJson('/api/v1/services/'.$service->id, $data);
        $response->assertStatus(200);

        
    }



   
}

