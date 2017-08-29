@component('mail::message')
# Tere

Te olete vastu võetud rühma {{$registration->field->name}}.

@if($group)
Teie rühma treenerid on
@foreach ($group->coaches as $coach)
    - {{$coach->person->name}}
@endforeach
@endif

Küsimused: {{$email}}

Tunniplaani saate vaadata <a href="http://www.trefoil.ee/spordikool/tunniplaan">siit</a>.

Ootame Teid treeningutele!

Spordikool Trefoil
@endcomponent
