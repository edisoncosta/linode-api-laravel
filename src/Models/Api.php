<?php
/**
 * Curl wrapper
 *
 * @package agiuscloud/linode-api-laravel
 * @author Trevor Sewell <trevor@fastfwd.com>
 */
namespace AgiusCloud\Linode\Models;

class Api
{
    protected $endpoint;
    protected $headers;

    /**
     * Constructor
     *
     * Get config for endpoint and set global headers
     *
     * @return void
     */
    public function __construct()
    {
        $this->endpoint = config('linode.endpoint') ;
        $this->headers = [
            'Content-Type: application/json',
            'Authorization: token '.config('linode.token')
        ];
    }

    /**
     * Get method
     *
     * @var string $url
     * @var array $query
     * @return json
     * 
     */
    public function get(string $url, array $query=null)
    {
        if ($query) {
            $this->headers[] = 'X-Filter: ' . json_encode($query);
        }
        $url = $this->endpoint . $url;
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER => $this->headers
        ]);
        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }
	
    /**
     * Post method
     *
     * @var string $url
     * @var array $data	 
     * @return json
     */
    public function post(string $url, array $data=[])
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $this->endpoint . $url,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => $this->headers
        ]);
        $response = curl_exec($curl);
        curl_close($curl);
        
        return $response;
    }

    /**
     * Put method
     *
     * @var string $url
     * @var array $data	 
     * @return json
     */
    public function put(string $url, array $data=[])
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $this->endpoint . $url,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => $this->headers
        ]);
        $response = curl_exec($curl);
        curl_close($curl);
        
        return $response;
    }
	
    /**
     * delete method
     *
     * @var string $url
     * @return json
     */
    public function delete($url)
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $this->endpoint . $url,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => $this->headers
        ]);
        $response = curl_exec($curl);
        curl_close($curl);
        
        return $response;
    }

}