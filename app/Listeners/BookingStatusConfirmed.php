<?php

namespace App\Listeners;

use Pusher\Pusher;
use App\Models\Booking;
use Illuminate\Support\Facades\Config;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Spatie\ModelStatus\Events\StatusUpdated;

class BookingStatusConfirmed
{
    /**
     * Create the event listener.
     */

     private $booking;
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     */
    public function handle(StatusUpdated $event): void
    {
        if (get_class($event->model) == Booking::class) {
            $this->booking = $event->model;
            if ($this->booking->status == 'confirmed') {
               
                  $pusher = new Pusher(
                    Config::get('app.connections.pusher.key'),
                    Config::get('app.connections.pusher.secret'),
                    Config::get('app.connections.pusher.app_id'),
                    Config::get('app.connections.pusher.options')
                  );
                
                  $data['message'] = 'Your booking has been confirmed';
                  $pusher->trigger('my-channel', 'my-event', $data);
            }
        }
    }
}
