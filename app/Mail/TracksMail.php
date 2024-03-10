<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TracksMail extends Mailable
{
    use Queueable, SerializesModels;

    public $store, $url, $userName, $offerPercent, $storeUrl, $discountType;

    public function __construct($userName, $store, $discountType, $offerPercent, $storeUrl) {
        $this->store = $store;
        $this->url = route('plans');
        $this->userName = $userName;
        $this->discountType = $discountType;
        $this->offerPercent = $offerPercent;
        $this->storeUrl = $storeUrl;
    }

    public function envelope(): Envelope {
        return new Envelope(
            subject: 'New Offer Mail By AlertSite Team',
        );
    }

    public function content(): Content {
        return new Content(
            markdown: 'mail.tracks-mail',
            with: [
                'store' => $this->store,
                'url' => $this->url,
                'userName' => $this->userName,
                'offerPercent' => $this->offerPercent,
                'storeUrl' => $this->storeUrl
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array {
        return [];
    }
}
