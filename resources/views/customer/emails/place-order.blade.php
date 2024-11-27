@component('mail::message')

# {{$subject}}


Hello ,
{{$user->customer->first_name}} ,
You have place order to {{ config('app.name') }}, Your Order No - <b>{{$invoceData['order']->order_no}}</b> .

 @include('customer.emails.order',['invoceData'=>$invoceData,'user'=>$user])

 {{-- @component('mail::button', ['url' => $url])
{{ $actionText }}
@endcomponent --}}
Sincerely,<br>
{{ config('app.name') }}
<br>

@endcomponent
