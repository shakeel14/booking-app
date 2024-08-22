<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,
            'user_name' => $this->user->name,
            'service_name' => $this->service->name,
            'amount' => $this->amount,
            'status' => $this->status,
            
        ];
    }
}
