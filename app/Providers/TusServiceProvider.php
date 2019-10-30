<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use TusPhp\Tus\Server as TusServer;

class TusServiceProvider extends ServiceProvider
{
    // ...

    /**
	 * Register the application services.
	 *
	 * @return void
	 */
    public function register()
    {
        $this->app->singleton('tus-server', function ($app) {
            $server = new TusServer('redis');

            $server
                ->setApiPath('/tus') // tus server endpoint.
                ->setUploadDir(storage_path('public/uploads')); // uploads dir.

            return $server;
        });
    }

    // ...

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
