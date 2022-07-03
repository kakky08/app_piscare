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

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\HotpepperController;

Auth::routes();


/* ====================
    Admin 認証不要
==================== */

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect('admin/home');
    });
    Route::get('/login', 'Admin\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Admin\LoginController@login')->name('login');
});


/* ====================
    Admin ログイン後
==================== */

Route::prefix('admin')->middleware('auth:admin')->name('admin.')->group(function () {
    Route::post('/logout', 'Admin\LoginController@logout')->name('logout');
    Route::get('/home', 'Admin\HomeController@index')->name('home');
    Route::get('/recipe', 'RakutenController@updateRecipe')->name('recipe');
    Route::get('/category', 'RakutenController@updateCategory')->name('category');
    Route::get('/shop', 'HotpepperController@updateShop')->name('shop');
    Route::get('/area', 'HotpepperController@updateArea')->name('area');
});


/* ====================
    Mypage
==================== */

/* --------------------
    Home
-------------------- */
Route::prefix('home')->name('home.')->group(function(){
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/{move}', 'HomeController@moveMonth')->name('move');
    Route::post('/record', 'HomeController@record')->name('record');
    Route::get('/select/{select}', 'HomeController@selectDay')->name('select');
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
    Route::get('/{name}', 'ProfileController@show')->name('show');
});


Route::prefix('user')->name('user.')->middleware('auth')->group(function () {
    Route::get('/{id}', 'UserController@show')->name('show');
    Route::get('/{id}/followings', 'UserController@followings')->name('followings');
    Route::get('/{id}/followers', 'UserController@followers')->name('followers');
    Route::put('/{id}/follow', 'UserController@follow')->name('follow');
    Route::delete('/{id}/follow', 'UserController@follow')->name('follow');
});

/* ====================
    Recipe Page
==================== */

Route::prefix('recipe')->name('recipe.')->group(function () {
    Route::get('/', 'RecipeController@index')->name('index');
    Route::get('/{id}', 'RecipeController@show')->name('show');
    Route::get('/search', 'RecipeController@search')->name('search');
    Route::get('/category/{id}', 'RecipeController@category')->name('category');
    Route::put('/{recipe}/like', 'RecipeController@like')->name('like');
    Route::delete('/{recipe}/like', 'RecipeController@unlike')->name('unlike');
});

/* ====================
    Post Page
==================== */

Route::prefix('post')->name('post.')->group(function () {
    Route::get('/', 'PostController@index')->name('index');
    Route::get('/create', 'PostController@create')->name('create');
    Route::post('/store', 'PostController@store')->name('store');
    Route::get('/{post}/edit', 'PostController@edit')->name('edit');
    Route::get('/{post}/material/edit', 'PostController@materialShow')->name('material.show');
    Route::post('/material/store', 'PostController@materialStore')->name('material.store');
    Route::put('/material/{post}/update', 'PostController@materialUpdate')->name('material.update');
    Route::post('/seasoning/store', 'PostController@seasoningStore')->name('seasoning.store');
    Route::put('/seasoning/update', 'PostController@seasoningUpdate')->name('seasoning.update');
    Route::post('/people/store', 'PostController@peopleStore')->name('people.store');
    Route::get('/{post}/procedure/edit', 'PostController@procedureShow')->name('procedure.show');
    Route::post('/procedure/store', 'PostController@procedureStore')->name('procedure.store');
    Route::put('/procedure/{post}/update', 'PostController@procedureUpdate')->name('procedure.update');
    Route::put('/{post}/like', 'PostController@like')->name('like');
    Route::delete('/{post}/like', 'PostController@unlike')->name('unlike');
});

/* ====================
    Shop Page
==================== */

Route::prefix('shop')->name('shop.')->group(function () {
    Route::get('/', 'ShopController@index')->name('index');
    Route::get('/search', 'ShopController@search')->name('search');
});
