<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('registration');
});

Route::get('test-email', function () {
    $user = \App\User::superAdmin();
    $user->notify(new \App\Notifications\TestEmail());
    dd("Test email sent");
});

Route::get('registration', 'RegistrationsController@create');
Route::post('registrations', 'RegistrationsController@store');

Route::get('admin/registrations', 'RegistrationsController@index');
Route::get('admin/registrations/fetch', 'RegistrationsController@fetch');
Route::get('admin/registrations/waiting-count', 'RegistrationsController@waitingCount');
Route::get('admin/registrations/{registration}', 'RegistrationsController@show');
Route::put('admin/registrations/{registration}/accept', 'RegistrationsController@accept');
Route::put('admin/registrations/{registration}/reject', 'RegistrationsController@reject');

Route::get('admin/fields', 'FieldsController@index');
Route::get('admin/fields/fetch', 'FieldsController@fetch');
Route::put('admin/fields/{field}/not-full', 'FieldsController@notFull');
Route::put('admin/fields/{field}/is-full', 'FieldsController@isFull');

Route::get('admin/coaches', 'CoachesController@index');
Route::get('admin/coaches/fetch', 'CoachesController@fetch');

Route::get('admin/groups', 'GroupsController@index');
Route::get('admin/groups/fetch', 'GroupsController@fetch');
Route::put('admin/groups/{group}', 'GroupsController@update');

Route::get('admin/gymnasts', 'GymnastsController@index');
Route::get('admin/gymnasts/fetch', 'GymnastsController@fetch');
Route::put('admin/gymnasts/{gymnast}', 'GymnastsController@update');

Auth::routes();

Route::get('/home', 'HomeController@index');
