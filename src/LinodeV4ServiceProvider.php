<?php
/**
 * Linode api service provider
 *
 * @package kudosagency/linodev4
 * @author Trevor Sewell <trevor@fastfwd.com>
 */
namespace Kudosagency\Linodev4;

use Illuminate\Support\ServiceProvider;

class LinodeV4ServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/linodev4.php' => config_path('linodev4.php'),
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
