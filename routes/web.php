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

Route::get('/', function () { /*Calls to the view home*/
    return view('home');
})
->name('home');

Route::get('/home', function () { /*Calls to the view home*/
    return view('home');
});

Auth::routes();

Route::get('/home/insertAvatar', function () { /*Calls to the view insertAvatarForm*/
    return view('insertAvatarForm');
})
->name ('insertAvatar');

Route::post('/home/insertAvatar')   /*Before a form's post calls to the controller for upload the avatar*/
    ->name('addAvatarSubmit')
    ->uses('AvatarController@addAvatarSubmit');

Route::get('/avatar/{email}') /*Calls to the controller to show the image*/
    ->name('downloadAvatar')
    ->uses('AvatarController@downloadAvatar');

Route::get('/home/listerAvatars') /*Calls to the controller to show list the avatars*/
    ->uses('AvatarController@listerAvatars')
    ->name('listerAvatars');

Route::get('/home/listerAvatars/{email}') /*Calls to the controller to delete an avatar*/
    ->uses('AvatarController@deleteAvatar')
    ->name('deleteAvatar');