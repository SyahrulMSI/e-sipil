<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MidtransServiceProvicer extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        require base_path('App/Helpers/Midtrans.php');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
