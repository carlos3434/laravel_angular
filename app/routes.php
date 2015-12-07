<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('login');
});

Route::post('login', 'UserLogin@user');

Route::get('logout', 'UserLogin@logout');


Route::controller('images', 'ImagesController');
Route::controller('programas', 'ProgramasController');

Route::get('registrar',function(){
    $user=new User;
    $user->username='doggy';
    $user->email='ferc@hotmail.com';
    $user->password=Hash::make('doggy');
    $user->save();
    return "listo";
});