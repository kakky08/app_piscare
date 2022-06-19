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

// Route::get('/', function () {
//     return view('welcome');
// });

//  Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

/* ====================
    Auth認証
==================== */
Auth::routes();

/* ====================
    Mypage
==================== */

/* --------------------
    Home
-------------------- */
Route::prefix('home')->name('home.')->group(function(){
    Route::get('/', 'HomeController@index')->name('index');
});

/* --------------------
    Setting
-------------------- */
Route::prefix('setting')->name('setting.')->group(function () {
    Route::get('/', 'SettingController@index')->name('index');
});

/* --------------------
    Profile
-------------------- */
Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('/', 'ProfileController@index')->name('index');
});
