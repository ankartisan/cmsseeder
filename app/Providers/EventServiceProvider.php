<?php

namespace App\Providers;

use App\Events\AssetUploaded;
use App\Events\OrderCreated;
use App\Events\UserRegistered;
use App\Listeners\ResizeUploadedAsset;
use App\Listeners\SendUserAccountConfirmationEmail;
use App\Listeners\SendUserOrderCreateEmail;
use App\Listeners\SendUserWelcomeEmail;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UserRegistered::class => [
            SendUserWelcomeEmail::class,
            SendUserAccountConfirmationEmail::class
        ],
        OrderCreated::class => [
            SendUserOrderCreateEmail::class
        ],
        AssetUploaded::class => [
            ResizeUploadedAsset::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
