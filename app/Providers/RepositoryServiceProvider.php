<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind("App\\Repositories\\Managemant\\ItelManagementInterface", "App\\Repositories\\Managemant\\ItelManagementAbstract");
        $this->app->bind("App\\Repositories\\Managemant\\GrameenphoneInterface", "App\\Repositories\\Managemant\\GrameenphoneAbstract");

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
