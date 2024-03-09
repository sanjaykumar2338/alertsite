<?php

namespace App\Http\Middleware;

use App\Models\Plans;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckTrackLimit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = Auth::user();
        $subscription = $user->subscription('default');

        if ($subscription) {

            $currentSubscribedPlanPriceId = $subscription->stripe_price;

            $currentPlan = Plans::where('stripe_id', $currentSubscribedPlanPriceId)->first();

            if ($currentPlan) {
                $trackLimitByPlan = [
                    'free' => 1,
                    'basic' => 5,
                    'premium' => 10,
                ];

                $currentPlanName = $currentPlan->identifier;

                if (array_key_exists($currentPlanName, $trackLimitByPlan)) {
                    $trackLimit = $trackLimitByPlan[$currentPlanName];

                    if ($user->tracks()->count() >= $trackLimit) {
                        return redirect()->route('plans')->with('error', 'You have reached the track limit. Upgrade your subscription.');
                    }
                }
            }
        } else {
            return redirect()->route('plans')->with('error', 'To have access all features, Please buy a plan first');
        }

        return $next($request);
    }
}
