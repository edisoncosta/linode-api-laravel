<?php
/**
 * Curl wrapper
 *
 * @package kudosagency/linodev4
 * @author Trevor Sewell <trevor@fastfwd.com>
 */
namespace Kudosagency\Linodev4\Models;

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
        $this->endpoint = config('linodev4.endpoint') ;
        $this->headers = [
            'Content-Type: application/json',
            'Authorization: token '.config('linodev4.token')
        ];
    }

    /**
     * Get method
     *
     * @var string $url
     * @return json
     */
    public function get(string $url)
    {
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
            CURLOPT_POSTFIELDS => http_build_query($data),
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
            CURLOPT_POSTFIELDS => http_build_query($data),
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