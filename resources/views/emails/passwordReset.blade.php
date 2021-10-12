@component('mail::message')
# {{ $details['title'] }}

Cześć, {{ $details['name'] }}!

Otrzymaliśmy informację o chęci zresetowania hasła.<br>
Jeżeli to przez Ciebie została wykonana ta prośba, prosimy wcisnąć przycisk poniżej.<br>
W przeciwnym wypadku prosimy zignorować ten e-mail.<br>

@component('mail::button', ['url' => $details['url']])
RESET HASŁA
@endcomponent

Życzymy przyjemnego korzystania,<br>
{{ config('app.name') }}
@endcomponent
