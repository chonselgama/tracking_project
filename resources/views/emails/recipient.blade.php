@component('mail::message')

Salut M/Mme {{ $data['recipient'] }}.

Vous êtes le destinataire du colis comportant le code {{ $data['id'] }}
Veuillez valider "j'ai reçu" sur notre plateforme après avoir entré
le code du colis pour que l'expediteur sache que vous l'avez bien reçu.

Portez vous bien surtout,<br>
{{ config('app.name') }}
@endcomponent