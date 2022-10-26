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
    SPA用
==================== */
// Route::get('/{any?}', fn () => view('index'))->where('any', '.+');

/* ====================
    トップページ
==================== */
Route::get('/','TopController@index')->name('top');

/* ====================
    ソーシャルログイン
==================== */
Route::prefix('login')->name('login.')->group(function () {
    Route::get('/{provider}', 'Auth\LoginController@redirectToProvider')->name('{provider}');
    Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('{provider}.callback');
});

/* ====================
    ゲストログイン
==================== */
Route::get('guest', 'Auth\LoginController@guestLogin')->name('login.guest');

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
Route::resource('home', 'HomeController', ['only' => ['index']]);

Route::prefix('home')->name('home.')->group(function () {
    Route::get('/{move}', 'HomeController@moveMonth')->name('move');
    Route::post('/record', 'HomeController@record')->name('record');
    Route::get('/select/{select}', 'HomeController@selectDay')->name('select');
});


/* --------------------
    Record
-------------------- */
Route::prefix('record')->name('record.')->middleware('auth')->group(function () {
    Route::get('/', 'RecordController@index')->name('index');
    // Route::get('/{move}', 'RecordController@moveMonth')->name('move');
    Route::delete('/destroy/{record}', 'RecordController@destroy')->name('destroy');
    Route::post('/store', 'RecordController@store')->name('store');
    // Route::get('/select/{select}', 'RecordController@selectDay')->name('select');
});

/* --------------------
    Record
-------------------- */
Route::prefix('target')->name('target.')->middleware('auth')->group(function () {
    Route::get('/', 'TargetController@index')->name('index');
    Route::post('/', 'TargetController@store')->name('store');
});

/* --------------------
    Setting
-------------------- */
Route::prefix('setting')->name('setting.')->middleware('auth')->group(function () {
    Route::get('/', 'SettingController@index')->name('index');
    Route::patch('/name/{user}', 'SettingController@updateName')->name('updateName');
    Route::patch('/password/{user}', 'SettingController@updatePassword')->name('updatePassword');
    Route::patch('/email/{user}', 'SettingController@updateEmail')->name('updateEmail');
    Route::patch('/icon/{user}', 'SettingController@updateIcon')->name('updateIcon');
});

/* --------------------
    Profile
-------------------- */
Route::prefix('profile')->name('profile.')->middleware('auth')->group(function () {
    Route::get('/{name}', 'ProfileController@show')->name('show');
    Route::get('likes/{name}', 'ProfileController@likes')->name('likes');
    Route::get('followings/{name}', 'ProfileController@followings')->name('followings');
    Route::get('followers/{name}', 'ProfileController@followers')->name('followers');
});

/* ====================
    Recipe Page
==================== */

Route::prefix('recipe')->name('recipe.')->middleware('auth')->group(function () {
    Route::get('/', 'RecipeController@index')->name('index');
    Route::get('/popular', 'RecipeController@popular')->name('popular');
    Route::get('/search', 'RecipeController@search')->name('search');
    Route::get('/{id}', 'RecipeController@show')->name('show');
    Route::get('/category/{id}/{name}', 'RecipeController@category')->name('category');
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
    Route::delete('/{post}', 'PostController@destroy')->name('destroy');
    Route::get('edit/{post}', 'PostController@edit')->name('edit');
    Route::put('/title/{post}/update', 'PostController@titleUpdate')->name('title.update');
    Route::put('/mainImage/{post}/update', 'PostController@mainImageUpdate')->name('mainImage.update');
    Route::put('/description/{post}/update', 'PostController@descriptionUpdate')->name('description.update');
    Route::get('/{post}/material/edit', 'PostController@materialShow')->name('material.show');
    Route::post('/material/store', 'PostController@materialStore')->name('material.store');
    Route::put('/material/{post}/update', 'PostController@materialUpdate')->name('material.update');
    Route::post('/seasoning/store', 'PostController@seasoningStore')->name('seasoning.store');
    Route::put('/seasoning/update', 'PostController@seasoningUpdate')->name('seasoning.update');
    Route::post('/people/store', 'PostController@peopleStore')->name('people.store');
    Route::get('/{post}/procedure/edit', 'PostController@procedureShow')->name('procedure.show');
    Route::post('/procedure/store', 'PostController@procedureStore')->name('procedure.store');
    Route::put('/procedure/update', 'PostController@procedureUpdate')->name('procedure.update');
    Route::delete('/procedure/destroy', 'PostController@procedureDestroy')->name('procedure.destroy');
    Route::put('/procedure/sort', 'PostController@procedureSort')->name('procedure.sort');
    Route::put('/like/{post}', 'PostController@like')->name('like');
    Route::delete('/like/{post}', 'PostController@unlike')->name('unlike');
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
