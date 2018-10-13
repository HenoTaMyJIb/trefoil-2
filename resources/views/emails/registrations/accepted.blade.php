@component('mail::message')
# Tere, {{$firstname}}!

Ootame Teid "{{$group->name}}" rühma proovitrenni. Proovitrennide tunniplaani saate vaadata <a href="http://trefoil.ee/proovitrennide-tunniplaan">siit</a>.

Riided: mugavad spordiriided (püksid, t-särk). Soovi korral võib jalga panna sokid.

Proovitrenni hind on 7 euro, tasumine kohapeal. Kui te otsustate treeninguid jätkata ja sõlmite lepingu, siis proovitrenni hind on kuutasu sees.

Küsimuste korral kirjutage {{$email}}.

Ootame Teid treeningutele!


-----------------------------
Здравствуйте!

Ждем Вас на пробную тренировку в группу "{{$group->name}}". Расписание пробных тренировок можете посмотреть <a href="http://trefoil.ee/proovitrennide-tunniplaan">здесь</a>.

Приходите в удобной спортивной одежде (шорты, футболка). Обувь не обязательна, можно тренироваться в носочках.

Стоимость пробной тренировки 7 евро, оплата на месте. Если Вы заключите договор, то пробная тренировка входит в стоимость месячной оплаты.

Если у Вас есть вопросы пишите нам {{$email}}.

Увидимся на тренировках!

Spordikool Trefoil
@endcomponent
