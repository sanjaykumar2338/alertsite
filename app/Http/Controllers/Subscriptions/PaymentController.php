<?php

namespace App\Http\Controllers\Subscriptions;

use App\Http\Controllers\Controller;
use App\Models\Plans;
use App\Models\Tracks;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index() {
        $data = [
            'intent' => auth()->user()->createSetupIntent()
        ];

        return view('subscriptions.payment')->with($data);
    }
    public function store(Request $request) {

        $subscription = auth()->user()->subscription('default');

        if ($subscription){
            $subscription->items()->delete();
            $subscription->delete();
        }

        $plan = Plans::find($request->plan);
        $planId = $plan->stripe_id;

        $user = $request->user();
        $paymentMethod = $request->get('payment_method');
        $user->createOrGetStripeCustomer();
        $user->addPaymentMethod($paymentMethod);
        try {
            $user->newSubscription('default', $planId)
                ->create($paymentMethod, [
                    'email' => $user->email,
                ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        session()->flash('success', 'Subscription successful! You are now subscribed to the selected plan. <a href="'.route('track').'">Start Tracking</a>');
        return to_route('plans');
    }

    public function subscriptionCancel() {

        $user = auth()->user();

        $tracks = Tracks::where('user_id', $user->id)->get();

        foreach ($tracks as $track){
            $track->update(['status' => 0]);
        }

        $subscription = $user->subscription('default');

        $subscription->items()->delete();

        $subscription->delete();

        session()->flash('cancel', 'Subscription canceled successfully.');
        return to_route('plans');
    }


}
