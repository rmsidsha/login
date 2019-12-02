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

Route::get('boot', function () {
    return view('boot');
});

Route::resource('register', 'UsersController'); // 회원가입
Route::resource('signin', 'SigninController');  // 로그인
Route::delete('logout', 'SigninController@logout_user')->name('logout');  // 로그아웃

Route::resource('home', 'HomeController'); // 메인화면

// Route::get('auth/reset/{token}', ...)->where('token', '[\pL-pN{64}]'); 책에 나온 대로 했는데 안됨.

Route::get('remind', [
    'as' => 'remind.create',
    'uses' => 'PasswordsController@getRemind'
]);

Route::post('remind', [
    'as' => 'remind.store',
    'uses' => 'PasswordsController@postRemind'
]);

Route::get('reset/{token}', [
    'as' => 'reset.create',
    'uses' => 'PasswordsController@getReset'
]);

Route::post('reset', [
    'as' => 'reset.store',
    'uses' => 'PasswordsController@postReset'
]);