<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\UserCreatedEvent;

class UserCreatedEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserCreatedEvent $event)
    {
        $data = ['name' => 'Naveed'];
        \Illuminate\Support\Facades\Log::error($event->user->email);
        \Illuminate\Support\Facades\Mail::send('welcome', $data, function ($message) use ($event) {

            $message->from('naveealikhan@outlook.com', 'null-byte');

            $message->to($event->user->email, $event->user->name);
            $message->subject('Test Mail');

        });
    }
}
