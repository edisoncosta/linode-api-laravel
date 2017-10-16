<?php
/**
 * Linode api facade
 *
 * @package agiuscloud/linode-api-laravel
 * @author Trevor Sewell <trevor@fastfwd.com>
 */
namespace AgiusCloud\Linode\Facades;

use Illuminate\Support\Facades\Facade;

class Linode extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Linode';
    }
}
