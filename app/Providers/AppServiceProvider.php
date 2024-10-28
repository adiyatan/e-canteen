<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Contract\Messaging;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton(Messaging::class, function ($app) {
            $firebase = (new Factory)->withServiceAccount(base_path('storage/app/json/e-canteen-f49a4-firebase-adminsdk-3rg2f-10809c8e90.json'));
            return $firebase->createMessaging();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
