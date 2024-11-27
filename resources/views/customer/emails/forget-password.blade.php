@component('mail::message')

# {{$subject}}


Hello ,
{{$user->customer->first_name}} ,
you have made a request to change your Password in  {{ config('app.name') }} ,
 Please go through the following link .

@component('mail::button', ['url' => $url])
{{ $actionText }}
@endcomponent
Sincerely,<br>
{{ config('app.name') }}
<br>

@endcomponent
