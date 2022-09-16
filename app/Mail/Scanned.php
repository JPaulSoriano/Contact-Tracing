<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Time;

class Scanned extends Mailable
{
    use Queueable, SerializesModels;

    public Time $time;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Time $time)
    {
        $this->time = $time;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.scanned')->subject('Scanned');
    }
}
