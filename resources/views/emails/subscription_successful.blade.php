@component('mail::message')
# Subscription Successful

You have successfully subscribed to our plan. Thank you for choosing our service!

@component('mail::button', ['url' => route('track')])
Start Tracking
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent