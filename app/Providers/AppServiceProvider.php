<?php

namespace App\Providers;

use App\Models\Subscription;
use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\SubscriptionItem;

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
        Cashier::useSubscriptionModel(Subscription::class);
        Cashier::useSubscriptionItemModel(SubscriptionItem::class);
    }
}
