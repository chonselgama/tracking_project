@component('mail::message')

Salut M/Mme {{ $data['sender'] }}, merci infiniment de nous avoir confié
le transport de votre colis jusqu'à bon port.

Le numéro de votre colis est le suivant : {{ $data['id'] }}
Veuillez le suivre avec cet code via l'application web.

Portez vous bien surtout,<br>
{{ config('app.name') }}
@endcomponent
