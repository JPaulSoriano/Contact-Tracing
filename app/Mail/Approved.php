<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Fetcher;

class Approved extends Mailable
{
    use Queueable, SerializesModels;
    public Fetcher $fetcher;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Fetcher $fetcher)
    {
        $this->fetcher = $fetcher;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.approved')->subject('Approved');
    }
}
