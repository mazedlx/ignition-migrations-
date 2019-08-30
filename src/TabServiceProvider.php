<?php

namespace Mazedlx\Migrations;

use Facade\Ignition\Ignition;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Mazedlx\Migrations\Http\Middleware\Authorize;

class TabServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->booted(function () {
            $this->routes();
        });

        Ignition::tab(app(Tab::class));
    }

    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        if (!config('app.debug')) {
            return;
        }

        Route::prefix('ignition-vendor/mazedlx/ignition-migrations')
                ->group(__DIR__.'/../routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
