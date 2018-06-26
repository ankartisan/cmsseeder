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

// USER
Route::get('/', 'Web\PageController@home')->name('home');
Route::get('/login', 'Web\PageController@login')->name('login');
Route::get('/register', 'Web\PageController@register')->name('register');
Route::get('/register/confirmation/{code}', 'Auth\AuthController@confirmation')->name('confirmation');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@resetPasswordForm')->name('password.reset');
Route::get('/password/reset', 'Auth\ForgotPasswordController@linkRequestForm')->name('password.request');

Route::post('login', 'Auth\AuthController@login');
Route::post('register', 'Auth\RegisterController@register');
Route::post('login-facebook', 'Auth\AuthController@loginFacebook');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// CONTACT
Route::get('/contact', 'Web\PageController@contact')->name('contact');
Route::post('/contact', 'Web\PageController@contactSubmit')->name('contact.submit');
// LEGAL
Route::get('/terms-and-conditions', 'Web\PageController@termsConditions')->name('terms_conditions');
Route::get('/privacy-policy', 'Web\PageController@privacyPolicy')->name('privacy_policy');
// SITEMAP
Route::get('/sitemap', 'Web\PageController@sitemap')->name('sitemap');
Route::get('/sitemap.xml', 'Web\PageController@sitemapXML')->name('sitemap_xml');

Route::group(['middleware' => 'auth'], function () {

    Route::get('logout', 'Auth\AuthController@logout')->name('logout');
});

// ADMIN
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');

        Route::get('/users/search', 'Admin\UserController@search');
        Route::get('/users/{id}', 'Admin\UserController@user')->name('admin.user');
        Route::get('/users', 'Admin\UserController@users')->name('admin.users');
        Route::post('users', 'Admin\UserController@store');
        Route::put('users/{id}', 'Admin\UserController@update');
        Route::delete('users/{id}', 'Admin\UserController@delete');
        Route::post('users/{id}/avatar-upload', 'Admin\UserController@avatarUpload');

        Route::get('/posts/search', 'Admin\PostController@search');
        Route::get('/posts/{id}', 'Admin\PostController@show')->name('admin.post');
        Route::get('/posts', 'Admin\PostController@index')->name('admin.posts');
        Route::post('posts', 'Admin\PostController@store');
        Route::put('posts/{id}', 'Admin\PostController@update');
        Route::delete('posts/{id}', 'Admin\PostController@delete');
        Route::post('/posts/{id}/photos-upload', 'Admin\PostController@photoUpload');

        Route::get('/categories/search', 'Admin\CategoryController@search');
        Route::get('/categories/{id}', 'Admin\CategoryController@show')->name('admin.category');
        Route::get('/categories', 'Admin\CategoryController@index')->name('admin.categories');
        Route::post('categories', 'Admin\CategoryController@store');
        Route::put('categories/{id}', 'Admin\CategoryController@update');
        Route::delete('categories/{id}', 'Admin\CategoryController@delete');

        Route::post('/assets/upload', 'Admin\AssetController@upload');
        Route::get('/assets/search', 'Admin\AssetController@search');
        Route::get('/assets/{id}', 'Admin\AssetController@show')->name('admin.asset');
        Route::get('/assets', 'Admin\AssetController@index')->name('admin.assets');
        Route::delete('/assets/{id}', 'Admin\AssetController@delete');

        Route::get('/pages/search', 'Admin\PageController@search');
        Route::get('/pages/{id}', 'Admin\PageController@show')->name('admin.page');
        Route::get('/pages', 'Admin\PageController@index')->name('admin.pages');
        Route::post('pages', 'Admin\PageController@store');
        Route::put('pages/{id}', 'Admin\PageController@update');
        Route::delete('pages/{id}', 'Admin\PageController@delete');
    });
});

