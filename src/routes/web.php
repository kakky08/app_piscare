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

});


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

/* ====================
    Recipe Page
==================== */

Route::prefix('recipe')->name('recipe.')->group(function () {
    Route::get('/', 'RecipeController@index')->name('index');
    Route::get('/{id}', 'RecipeController@show')->name('show');
    Route::get('/search', 'RecipeController@search')->name('search');
    Route::get('/category/{id}', 'RecipeController@category')->name('category');
});

/* ====================
    Post Page
==================== */

Route::prefix('post')->name('post.')->group(function () {
    Route::get('/', 'PostController@index')->name('index');
    Route::get('/create', 'PostController@create')->name('create');
    Route::get('/{post}/edit', 'PostController@edit')->name('edit');
    Route::get('/{post}/material/edit', 'PostController@materialEdit')->name('material');
    Route::get('/{post}/procedure/edit', 'PostController@procedureEdit')->name('procedure');
});

/* ====================
    Shop Page
==================== */

Route::prefix('shop')->name('shop.')->group(function () {
    Route::get('/', 'ShopController@index')->name('index');
});
