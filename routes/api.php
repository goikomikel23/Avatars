<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function () {
    Route::match(['get', 'post'],'/avatar/{email}')
        ->name('avatarApi')
        ->uses('AvatarController@findAvatar');
    Route::match(['get', 'post'],'/avatarImageApi/{email}')
        ->name('downloadAvatarApi')
        ->uses('AvatarController@downloadAvatar');
});

