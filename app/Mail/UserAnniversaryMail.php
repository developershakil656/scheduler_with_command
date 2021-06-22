<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserAnniversaryMail extends Mailable
{
    use Queueable, SerializesModels;
    public $year,$name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($year,$name)
    {
        $this->year = $year;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('anniversary');
    }
}
