<?php

namespace App\Providers;

use App\Link;
use App\Lucky;
use App\Observers\LinkObserver;
use App\Observers\LuckyObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Link::observe(LinkObserver::class);
        Lucky::observe(LuckyObserver::class);
    }
}
