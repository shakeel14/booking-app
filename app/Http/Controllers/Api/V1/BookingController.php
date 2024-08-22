<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use App\Http\Requests\StoreBookingRequest;

class BookingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    { 
        return BookingResource::collection(Booking::with(['user','service','statuses'])->get());
    }

     public function store(StoreBookingRequest $request)
    {
       $booking = Booking::create($request->validated());   
       $booking->load(['user','service','statuses']);
       $booking->setStatus('New');
       return BookingResource::make($booking);

    }

    public function confirmed(Booking $booking)
    { 
        $booking->setStatus('Completed');
        return BookingResource::make($booking);
    }

}
