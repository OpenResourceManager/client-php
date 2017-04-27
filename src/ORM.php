<?php namespace OpenResourceManager\Client;

use Unirest\Request as UniRequest;
use Unirest\Request\Body as UniBody;

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 10:29 AM
 */

/**
 *  ORM Client
 *
 * Communicates with an ORM API.
 *
 * @author Alex Markessinis
 */
class ORM
{

    protected $secret = null;
    protected $baseURL = null;
    protected $jwt = null;
    protected $uniRequest = null;
    protected $uniBody = null;


    /**
     * ORM constructor.
     * @param string $secret
     * @param string $apiHost
     * @param int $apiVersion
     * @param int $apiPort
     * @param bool $useHTTPS
     * @throws \Exception
     */
    function __construct($secret = '', $apiHost = 'localhost', $apiVersion = 1, $apiPort = 8000, $useHTTPS = false)
    {
        // Check that we have an API secret and set it.
        if (!empty($secret)) {
            $this->secret = $secret;
        } else {
            throw new \Exception('Empty ORM API secret was supplied. Grab your secret from the ORM API console.', '800');
        }
        // Build and set the base API url
        $this->baseURL = [($useHTTPS) ? 'https://' : 'http://', $apiHost, ':', $apiPort, '/api', '/v', $apiVersion, '/'];
        // Create a new rest client object
        $this->uniRequest = new UniRequest();
        $this->uniBody = new UniBody();
        // Authenticate with the API
        $this->jwt = $this->authenticate();

        echo $this->jwt;
    }

    /**
     * Forms an API url from a route path
     *
     * @param string $path
     * @return string
     */
    private function urlFromRoute($path = '')
    {
        $url = $this->baseURL;
        $url[] = $path;
        return implode('', $url);
    }

    /**
     * @return string
     * @throws \HttpException
     */
    private function authenticate()
    {
        $headers = array('Accept' => 'application/json');
        $body = $this->uniBody::Form(['secret' => $this->secret]);
        $url = $this->urlFromRoute('auth');

        $response = $this->uniRequest::post($url, $headers, $body);

        if ($response->code == 200) {
            return $response->body->token;
        } else {
            throw  new \HttpException($response->body->errors[0], $response->code);
        }

    }

}
