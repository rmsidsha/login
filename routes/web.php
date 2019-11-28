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


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('boot', function () {
    return view('boot');
});

// Route::resources([
//     'register' => 'UsersController',
//     'signin' => 'SigninController',
//     'home' => 'HomeController',
// ]);

// Route::group(['middleware' => ['web'],
//               'middleware' => ['auth']], function(){
//         Route::resources([
//             'register' => 'UsersController',
//             'signin' => 'SigninController',
//             'home' => 'HomeController',
//         ]);
// });

// Auth::routes();
Route::resource('register', 'UsersController');
Route::resource('signin', 'SigninController');
Route::delete('logout', 'SigninController@logout_user')->name('logout');
// [
//     'as' => 'logout',
//     'uses' => 'SigninController@logout_user',
// ]
Route::resource('home', 'HomeController');
