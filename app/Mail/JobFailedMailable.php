<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Queue\SerializesModels;

class JobFailedMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $event;

    public function __construct(JobFailed $event)
    {
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('A job failed')->markdown('emails.job-failed');
    }
}
