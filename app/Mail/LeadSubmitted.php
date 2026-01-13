<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LeadSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $name,
        public string $email,
        public string $message,
        public string $pack = 'Contact',
    ) {}

    public function build()
    {
        return $this->subject('Nouveau message ('.$this->pack.') — '.config('purepage.brand_name'))
                    ->markdown('emails.lead_submitted');
    }
}