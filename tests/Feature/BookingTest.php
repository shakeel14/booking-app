<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Service;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookingTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_booking(): void
    {
        $user = User::factory()->create();
        $service = Service::factory()->create();

        // Define the data to be sent in the POST request
        $data = [
            'user_id' => $user->id,
            'service_id' => $service->id,
            'amount' =>  $service->price
        ];

        // Send a POST request to the API endpoint with the data
        $response = $this->postJson('/api/v1/booking', $data);

        // Assert the response status is 201 Created
        $response->assertStatus(201);
    }
}
