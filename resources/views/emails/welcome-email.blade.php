@component('mail::message')
# Hey there!

Thanks for registering to our new user of instagram!

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Regards,<br>
{{ config('app.name') }}
@endcomponent
