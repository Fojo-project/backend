@component('mail::message')
# Hello {{ $name }}

You requested to reset your password.

Click the button below to reset it:

@component('mail::button', ['url' => $resetUrl])
Reset Password
@endcomponent

This link will expire in 60 minutes.

If you didn`t request a password reset, no further action is required.

Thanks,
{{ config('app.name') }}
@endcomponent
