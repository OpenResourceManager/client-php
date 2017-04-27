<?php namespace OpenResourceManager\Client;

use Exception;
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
 * Communicates with an ORM API this is the base class.
 *
 * @author Alex Markessinis
 */
class ORM
{

    public $jwt = null;
    protected $secret = null;
    protected $baseURL = null;
    protected $authURL = null;
    protected $uniRequest = null;
    protected $uniBody = null;
    protected $route = null;
    protected $headers = ['Accept' => 'application/json'];

    /**
     * ORM constructor.
     * @param string $secret
     * @param string $apiHost
     * @param int $apiVersion
     * @param int $apiPort
     * @param bool $useHTTPS
     * @throws Exception
     */
    function __construct($secret = '', $apiHost = 'localhost', $apiVersion = 1, $apiPort = 8000, $useHTTPS = false)
    {
        // Check that we have an API secret and set it.
        if (!empty($secret)) {
            $this->secret = $secret;
        } else {
            throw new Exception('Empty ORM API secret was supplied. Grab your secret from the ORM API console.', '800');
        }
        // Build and set the base API url
        if (empty($this->route)) {
            $this->baseURL = [($useHTTPS) ? 'https://' : 'http://', $apiHost, ':', $apiPort, '/api', '/v', $apiVersion, '/'];
        } else {
            $this->baseURL = [($useHTTPS) ? 'https://' : 'http://', $apiHost, ':', $apiPort, '/api', '/v', $apiVersion, '/', $this->route, '/'];
        }
        // Build the auth url
        $this->authURL = implode('', [($useHTTPS) ? 'https://' : 'http://', $apiHost, ':', $apiPort, '/api', '/v', $apiVersion, '/auth/']);
        // Create a new rest client object
        $this->uniRequest = new UniRequest();
        $this->uniBody = new UniBody();
        // Authenticate with the API
        $this->jwt = $this->authenticate();
    }

    /**
     * Forms an API url from a route path
     *
     * @param string $path
     * @return string
     */
    public function urlFromRoute($path = '')
    {
        $url = $this->baseURL;
        $url[] = $path;
        return implode('', $url);
    }

    /**
     * @param $slug
     * @return mixed
     * @throws Exception
     */
    public function _get($slug)
    {
        // Build a url from the slug that was passed in
        $url = $this->urlFromRoute($slug);
        // Send a post request to the API
        $response = $this->uniRequest::get($url, $this->headers);
        // Check that we get 200 back
        if ($response->code == 200 || $response->code == 201) {
            // Return the parsed body
            return $response->body;
        } else {
            // If we did not get 200/201 throw an exception
            throw  new Exception($response->body->message, $response->code);
        }
    }

    /**
     * @param $slug
     * @param $data
     * @return mixed
     * @throws Exception
     */
    public function _post($slug, $data)
    {
        // Build a url from the slug that was passed in
        $url = $this->urlFromRoute($slug);
        // Send a post request to the API
        $response = $this->uniRequest::post($url, $this->headers, $data);
        // Check that we get 200 back
        if ($response->code == 200 || $response->code == 201) {
            // Return the parsed body
            return $response->body;
        } else {
            // If we did not get 200/201 throw an exception
            throw  new Exception($response->body->message, $response->code);
        }
    }

    /**
     * @return mixed
     * @throws Exception
     */
    private function authenticate()
    {
        // Build the form data
        $data = $this->uniBody::Form(['secret' => $this->secret]);
        // Send a post request to the API
        $response = $this->uniRequest::post($this->authURL, $this->headers, $data);
        // Check that we get 200 back
        if ($response->code == 200 || $response->code == 201) {
            // Grab the jwt from the response body
            $token = $response->body->token;
            // Set the authorization header
            $this->headers['Authorization'] = implode(' ', ['Bearer', $token]);
            // Return the parsed body
            return $token;
        } else {
            // If we did not get 200/201 throw an exception
            throw  new Exception($response->body->message, $response->code);
        }
    }
}
