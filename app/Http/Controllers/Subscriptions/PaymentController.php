<?php

namespace App\Http\Controllers\Subscriptions;

use App\Http\Controllers\Controller;
use App\Models\Plans;
use App\Models\Tracks;
use Illuminate\Http\Request;
use Laravel\Cashier\Exceptions\IncompletePayment;
class PaymentController extends Controller
{
    public function index() {
        $data = [
            'intent' => auth()->user()->createSetupIntent()
        ];

        return view('subscriptions.payment')->with($data);
    }
    public function store(Request $request) {
        try {
            $subscription = auth()->user()->subscription('default');
    
            if ($subscription) {
                $subscription->items()->delete();
                $subscription->delete();
            }
    
            $plan = Plans::find($request->plan);
            $planId = $plan->stripe_id;
    
            $user = $request->user();
            $paymentMethod = $request->get('payment_method');
            $user->createOrGetStripeCustomer();
            $user->addPaymentMethod($paymentMethod);
    
            $subscription = $user->newSubscription('default', $planId);
    
            // Apply coupon code if provided
            if ($request->has('coupon')) {
                $subscription->withCoupon($request->coupon);
            }
    
            $subscription->create($paymentMethod, [
                'email' => $user->email,
            ]);
    
            session()->flash('success', 'Subscription successful! You are now signed up. <a href="'.route('track').'">START TRACKING HERE.</a>');
            return redirect()->route('plans');
        } catch (IncompletePayment $exception) {
            // Handle incomplete payment
            dd($exception->getMessage());
        } catch (\Exception $e) {
            // Handle other exceptions
            dd($e->getMessage());
        }
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
