@component('mail::message')
# Tere, {{$firstname}}!

Ootame Teid "{{$group->name}}" rühma proovitrennile. Proovitrennide tunniplaani saate vaadata <a href="http://www.trefoil.ee/proovitrennide-tunniplaan">siit</a>.

Riided: mugavad spordiriided (püksid, t-särk). Soovi korral võib jalga panna sokid.

Küsimuste korral kirjutage {{$email}}.

Ootame Teid treeningutele!


-----------------------------
Здравствуйте!

Ждем Вас на пробную тренировку в группу "{{$group->name}}". Расписание пробных тренировок можете посмотреть <a href="http://www.trefoil.ee/proovitrennide-tunniplaan">здесь</a>.

Приходите в удобной спортивной одежде (шорты, футболка). Обувь не обязательна, можно тренироваться в носочках.

Если у Вас есть вопросы пишите нам {{$email}}.

Увидимся на тренировках!

Spordikool Trefoil
@endcomponent
