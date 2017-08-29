@component('mail::message')
# Tere,

Olete registreerinud rühma "{{$registration->field->name}}".

@if($registration->field->is_full)
Hetkel rühm on täis ning Teie taotlus on staatusega 'Ootel'. Võtame Teiega ühendust, siis kui koht vabaneb.
@else
Me võtame Teiega ühendust.
@endif

Aitäh,

Spordikool Trefoil

@endcomponent
