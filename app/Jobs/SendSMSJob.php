<?php

namespace App\Jobs;

use Aloha\Twilio\Support\Laravel\Facade;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendSMSJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $name, $phone_number, $storeName, $discountType, $amount, $shoppingUrl, $operator;

    public function __construct($name, $phone_number, $storeName, $discountType, $amount, $shoppingUrl, $operator) {
        $this->name = $name;
        $this->phone_number = $phone_number;
        $this->storeName = $storeName;
        $this->discountType = $discountType;
        $this->amount = $amount;
        $this->shoppingUrl = $shoppingUrl;
        $this->operator = $operator;
    }

    public function handle(): void {
        $message =
            "
            TrackRak Alert
            Hello [$this->name],
            [$this->storeName] is [$this->operator] [$this->discountType/$ $this->amount]
            Store link : [$this->shoppingUrl]
            TrackRak & Get More Money Back!
            Don't want these alerts?
            Login to your TrackRak account and update your alert settings.
        ";

        try {
            Facade::message($this->phone_number, $message);
            Log::info("Message sent successfully to {$this->phone_number}");
        } catch (\Exception $e) {
            Log::error("Error: " . $e->getMessage());
        }
    }


}
