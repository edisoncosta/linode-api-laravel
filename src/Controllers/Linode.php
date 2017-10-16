<?php
/**
 * Linode api controller
 *
 * @package agiuscloud/linode-api-laravel
 * @author Trevor Sewell <trevor@fastfwd.com>
 */    
namespace AgiusCloud\Linode\Controllers;

use App\Http\Controllers\Controller;
use AgiusCloud\Linode\Models\Api;

class Linode extends Controller
{
    protected $api ;
    protected $token ;
    protected $type ;
    
    /**
     * Constructor
     *
     * Get config and and create new api
     *
     * @return void
     */
    public function __construct()
    {
        $this->token = config('linode.token') ;
        $this->type = config('linode.type') ;
        $this->api = new Api ;
    }
    
    /**
     * Overload static methods for facade 
     *
     * @var string $name
     * @var array $arguments	 
     * @return json|array|object
     */
    public static function __callStatic(string $name, array $arguments)
    {
        $api = new Api ;
        $response = call_user_func_array([$api,$name], $arguments) ;
        if(config('linode.type')!=='JSON') $response = json_decode($response, config('linode.type')) ;
        return $response ;
    }
    
    /**
     * Overload methods 
     *
     * @var string $url
     * @var array $data	 
     * @return json|array|object
     */
    public function __call($name, $arguments)
    {
        $response = call_user_func_array([$this->api,$name], $arguments) ;
        if($this->type!=='JSON') $response = json_decode($response, $this->type=='Array') ;
        return $response ;
    }
}