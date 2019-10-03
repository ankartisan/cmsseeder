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

Route::get('/', 'Web\PageController@home')->name('home');

// AUTH
Route::get('/login', 'Web\AuthController@loginView')->name('login');
Route::post('/login', 'Web\AuthController@login');

// E-COMMERCE
Route::get('/products/search', 'Web\ProductController@search');
Route::get('/products/{id}', 'Web\ProductController@show')->name('product');
Route::get('/products', 'Web\ProductController@index')->name('products');
Route::get('/cart', 'Web\CartController@cart')->name('cart');
Route::get('/checkout', 'Web\CartController@checkout')->name('checkout');
Route::post('/order', 'Web\OrderController@create');
Route::get('/order/completed', 'Web\OrderController@completed')->name('order.completed');

Route::post('/cart/add/{id}', 'Web\CartController@add');
Route::post('/cart/remove/{id}', 'Web\CartController@remove');
Route::post('/cart/update/{id}', 'Web\CartController@update');

// CONTACT
Route::get('/contact', 'Web\PageController@contact')->name('contact');
Route::post('/contact', 'Web\PageController@contactSubmit')->name('contact.submit');

// LEGAL
Route::get('/terms-and-conditions', 'Web\PageController@termsConditions')->name('terms_conditions');
Route::get('/privacy-policy', 'Web\PageController@privacyPolicy')->name('privacy_policy');

// SITEMAP
Route::get('/sitemap', 'Web\PageController@sitemap')->name('sitemap');
Route::get('/sitemap.xml', 'Web\PageController@sitemapXML')->name('sitemap_xml');

// ADMIN
Route::group(['prefix' => 'admin'], function () {
    // AUTH
    Route::get('/login', 'Auth\LoginController@loginView')->name('login');
    Route::get('/register', 'Auth\RegisterController@registerView')->name('register');
    Route::get('/register/confirmation/{code}', 'Auth\ConfirmationController@confirmation')->name('confirmation');
    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@resetPasswordForm')->name('password.reset');
    Route::get('/password/reset', 'Auth\ForgotPasswordController@linkRequestForm')->name('password.request');

    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('logout', 'Auth\LoginController@logout')->name('logout');
    });

    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

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
        Route::put('/assets/{id}', 'Admin\AssetController@update');
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

        Route::get('/configs/search', 'Admin\ConfigController@search');
        Route::get('/configs/{id}', 'Admin\ConfigController@show')->name('admin.config');
        Route::get('/configs', 'Admin\ConfigController@index')->name('admin.configs');
        Route::post('configs', 'Admin\ConfigController@store');
        Route::put('configs/{id}', 'Admin\ConfigController@update');
        Route::delete('configs/{id}', 'Admin\ConfigController@delete');

        // E-COMMERCE
        Route::get('/products/search', 'Admin\ProductController@search');
        Route::get('/products/{id}/variants', 'Admin\ProductController@variants')->name('admin.product.variants');
        Route::get('/products/{id}', 'Admin\ProductController@show')->name('admin.product');
        Route::get('/products', 'Admin\ProductController@index')->name('admin.products');
        Route::post('products', 'Admin\ProductController@store');
        Route::put('products/{id}', 'Admin\ProductController@update');
        Route::put('/products/{id}/variants', 'Admin\ProductController@updateVariants');
        Route::delete('products/{id}', 'Admin\ProductController@delete');

        Route::get('/orders/search', 'Admin\OrderController@search');
        Route::get('/orders/{id}', 'Admin\OrderController@show')->name('admin.order');
        Route::get('/orders', 'Admin\OrderController@index')->name('admin.orders');
        Route::put('orders/{id}', 'Admin\OrderController@update');
        Route::delete('orders/{id}', 'Admin\OrderController@delete');
    });
});

