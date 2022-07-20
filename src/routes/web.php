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
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();

/* ====================
    ソーシャルログイン
==================== */
Route::prefix('login')->name('login.')->group(function () {
    Route::get('/{provider}', 'Auth\LoginController@redirectToProvider')->name('{provider}');
    Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('{provider}.callback');
});

Route::prefix('register')->name('register.')->group(function () {
    Route::get('/{provider}', 'Auth\RegisterController@showProviderUserRegistrationForm')->name('{provider}');
    Route::post('/{provider}', 'Auth\RegisterController@registerProviderUser')->name('{provider}');
});
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
    Route::get('/', 'HomeController@index')->name('index')->middleware('auth');
    Route::get('/{move}', 'HomeController@moveMonth')->name('move');
    Route::post('/record', 'HomeController@record')->name('record');
    Route::get('/select/{select}', 'HomeController@selectDay')->name('select');
});

/* --------------------
    Setting
-------------------- */
Route::prefix('setting')->name('setting.')->middleware('auth')->group(function () {
    Route::get('/', 'SettingController@index')->name('index');
});

/* --------------------
    Profile
-------------------- */
Route::prefix('profile')->name('profile.')->middleware('auth')->group(function () {
    Route::get('/{name}', 'ProfileController@show')->name('show');
    Route::get('/{name}/likes', 'ProfileController@likes')->name('likes');
    Route::get('/{name}/followings', 'ProfileController@followings')->name('followings');
    Route::get('/{name}/followers', 'ProfileController@followers')->name('followers');
});

/* ====================
    Recipe Page
==================== */

Route::prefix('recipe')->name('recipe.')->middleware('auth')->group(function () {
    Route::get('/', 'RecipeController@index')->name('index');
    Route::get('/popular', 'RecipeController@popular')->name('popular');
    Route::get('/search', 'RecipeController@search')->name('search');
    Route::get('/{id}', 'RecipeController@show')->name('show');
    Route::get('/category/{id}', 'RecipeController@category')->name('category');
    Route::put('/{recipe}/like', 'RecipeController@like')->name('like');
    Route::delete('/{recipe}/like', 'RecipeController@unlike')->name('unlike');
});

/* ====================
    Post Page
==================== */

Route::prefix('post')->name('post.')->middleware('auth')->group(function () {
    Route::get('/', 'PostController@index')->name('index');
    Route::get('/popular', 'PostController@popular')->name('popular');
    Route::get('/create', 'PostController@create')->name('create');
    Route::post('/store', 'PostController@store')->name('store');
    Route::get('/{id}', 'PostController@show')->name('show');
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

Route::prefix('shop')->name('shop.')->middleware('auth')->group(function () {
    Route::get('/', 'ShopController@index')->name('index');
    Route::get('/search', 'ShopController@search')->name('search');
});


/* ====================
    Information Page
==================== */

Route::prefix('information')->name('information.')->group(function () {
    Route::get('/{name}', 'InformationController@show')->name('show');
    Route::get('/{name}/likes', 'InformationController@likes')->name('likes');
    Route::get('/{name}/followings', 'InformationController@followings')->name('followings');
    Route::get('/{name}/followers', 'InformationController@followers')->name('followers');
});

/* ====================
    follow action
==================== */

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/{id}', 'UserController@show')->name('show');
    Route::put('/{id}/follow', 'UserController@follow')->name('follow');
    Route::delete('/{id}/follow', 'UserController@unfollow')->name('follow');
});
