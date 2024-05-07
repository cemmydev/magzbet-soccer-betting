@component('mail::message')
@component('mail::panel')
{{-- Hello {{ $user->name }}, --}}
<br>
{{$title}}
<br>
Your account was successfully created at {{ Carbon\Carbon::now()->format('jS M Y H:i') }}
<br>
{{$body}}
<br>
Thank you,<br>
{{ config('app.name') }}
@endcomponent
@endcomponent
