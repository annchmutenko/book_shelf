<?php

namespace App\Providers;

use App\Http\Middleware\AdminAccess;
use Illuminate\Routing\Router;
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
        $router = app(Router::class);
        $router->aliasMiddleware('admin_access', AdminAccess::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
