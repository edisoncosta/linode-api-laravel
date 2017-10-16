<?php
/**
 * Linode api facade
 *
 * @package kudosagency/linodev4
 * @author Trevor Sewell <trevor@fastfwd.com>
 */
namespace Kudosagency\Linodev4\Facades;

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
