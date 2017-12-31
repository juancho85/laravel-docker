<?php

namespace App\Listeners;

use App\Events\MessageSent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendNotification
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
     * @param  MessageSent  $event
     * @return void
     */
    public function handle(MessageSent $event)
    {
        $contact_message = $event->message;
        Mail::send('email.contact-message-notification', ['contact_message' => $contact_message],
            function($m) use ($contact_message) {
                $m->from('info@laracourse.com', 'Laravel Udemy course');
                $m->to('admin@laracourse.com', 'Laracourse admin');
                $m->subject('New contact message from ' . $contact_message->email);
            }
        );
    }
}
