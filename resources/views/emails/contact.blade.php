@component('mail::message')
{{ $body }}

This message was sent from {{ config('app.url') }}
@endcomponent
