<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Setting;

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
            subject: 'New Offer Mail By TrackRak Team',
        );
    }

    public function content(): Content {

        $template = Setting::first();
        if ($template) {
            // Replace placeholders with dynamic data
            $email_content = $template->email_content;
            $email_content = str_replace('{{store_name}}', $this->store, $email_content);
            $email_content = str_replace('{{url}}', $this->url, $email_content);
            $email_content = str_replace('{{customer_name}}', $this->userName, $email_content);
            $email_content = str_replace('{{discount_type}}', $this->discountType, $email_content);
            $email_content = str_replace('{{discount_amount}}', $this->offerPercent, $email_content);

            // Replace storeUrl and shopping_url with anchor tags
            $email_content = str_replace('{{url}}', '<a href="' . $this->url . '">' . $this->storeUrl . '</a>', $email_content);
            $email_content = str_replace('{{storeUrl}}', '<a href="' . $this->storeUrl . '">' . $this->storeUrl . '</a>', $email_content);
            $email_content = str_replace('{{shopping_url}}', '<a href="' . $this->storeUrl . '">' . $this->storeUrl . '</a>', $email_content);

            return new Content(
                markdown: 'mail.track',
                with: [
                    'store' => $this->store,
                    'url' => $this->url,
                    'userName' => $this->userName,
                    'offerPercent' => $this->offerPercent,
                    'storeUrl' => $this->storeUrl,
                    'shopping_url' => $this->storeUrl,
                    'email_content' => $email_content
                ],
            );
        } else {
            return new Content(
                markdown: 'mail.tracks-mail',
                with: [
                    'store' => $this->store,
                    'url' => $this->url,
                    'userName' => $this->userName,
                    'offerPercent' => $this->offerPercent,
                    'storeUrl' => $this->storeUrl,
                    'shopping_url' => $this->storeUrl
                ],
            );
        }
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
