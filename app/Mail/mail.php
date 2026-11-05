<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class mail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $attachmentData;
    public $attachmentName;

    public function __construct($details, $attachmentData = null, $attachmentName = null)
    {
        $this->details = $details;
        $this->attachmentData = $attachmentData;
        $this->attachmentName = $attachmentName;
    }

    public function build()
    {
        $mail = $this->subject($this->details['title'])
            ->view($this->details['view']);

        if ($this->attachmentData && $this->attachmentName) {
            $mail->attachData($this->attachmentData, $this->attachmentName);
        }

        return $mail;
    }
}
