<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Services>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $serviceId = Service::pluck('id')->random();
        return [
            'user_id' => User::pluck('id')->random(),
            'service_id' => $serviceId,
            'amount' =>Service::where('id',$serviceId)->get()->pluck('price')[0],
            
        ];
    }
}
