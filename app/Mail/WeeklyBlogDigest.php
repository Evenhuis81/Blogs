<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WeeklyBlogDigest extends Mailable
{
    use Queueable, SerializesModels;

    public $dblogs;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dblogs)
    {
        $this->dblogs = $dblogs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.weeklyblogdigest');
    }
}
