<?php
/**
 * Linode api service provider
 *
 * @package agiuscloud/linode-api-laravel
 * @author Trevor Sewell <trevor@fastfwd.com>
 */
namespace AgiusCloud\Linode;

use Illuminate\Support\ServiceProvider;

class LinodeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/linode.php' => config_path('linode.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
