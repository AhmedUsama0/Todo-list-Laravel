@component('mail::message')
# Hello!

We got a request that you forgot your password so please click the button below.


@component('mail::button', ['url' => $url ])
    Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
