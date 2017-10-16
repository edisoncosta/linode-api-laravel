<?php
/**
 * Linode api controller
 *
 * @package kudosagency/linodev4
 * @author Trevor Sewell <trevor@fastfwd.com>
 */    
namespace Kudosagency\Linodev4\Controllers;

use App\Http\Controllers\Controller;
use Kudosagency\Linodev4\Models\Api;

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
        $this->token = config('linodev4.token') ;
        $this->type = config('linodev4.type') ;
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
        if(config('linodev4.type')!=='JSON') $response = json_decode($response, config('linodev4.type')) ;
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