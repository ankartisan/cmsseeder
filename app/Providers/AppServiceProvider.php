<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use \Illuminate\Contracts\Encryption\Encrypter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Schema::defaultStringLength(191);

        if(env('APP_KEY')) {
            $encrypter = app(Encrypter::class);

            // CART
            if(Cookie::get('cs_cart_hash')) {
                $cart = Cart::where(['hash' => $encrypter->decrypt(Cookie::get('cs_cart_hash'))])->first();
            }

            View::share('cart', isset($cart) ? $cart : null);
        }

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
