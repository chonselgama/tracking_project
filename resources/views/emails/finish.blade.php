@component('mail::message')

Salut à vous.

Votre colis comportant le code {{ $data['id'] }} a bien été reçu
par le destinataire M/Mme {{ $data['recipient'] }}.

Portez vous bien surtout,<br>
{{ config('app.name') }}
@endcomponent