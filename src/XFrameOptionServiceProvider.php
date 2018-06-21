<?php

namespace Tecpresso\XFrameOption;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Http\Kernel;

class XFrameOptionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {
        $this->publishes([
              __DIR__.'/config/x-frame-options.php' => config_path('x-frame-options.php')
          ]);
        $kernel = $this->app[Kernel::class];
        $kernel->pushMiddleware(\Tecpresso\XFrameOption\Middleware\XFrameOption::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
