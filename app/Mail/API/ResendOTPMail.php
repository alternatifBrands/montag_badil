<?php

namespace App\Mail\API;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResendOTPMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $otp;
    public function __construct($user,$otp)
    {
        $this->user = $user;
        $this->otp = $otp;
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Resend OTP Mail',
        );
    }
    public function content(): Content
    {
        return new Content(
            view: 'api.auth.resend',
        );
    }
    public function attachments(): array
    {
        return [];
    }
}
