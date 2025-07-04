@component('mail::message')
# Hello {{ $name }}

Thank you for registering with us.

Click the button below to verify your email address:

@component('mail::button', ['url' => $verifyUrl])
Verify Email
@endcomponent

If you did not initiate this request, you can safely ignore this email.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
