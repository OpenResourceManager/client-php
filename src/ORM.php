<?php namespace OpenResourceManager;

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
 *  ORM
 *
 * Base ORM class, used to set environment variables like API key and host.
 *
 * @author Alex Markessinis
 */
class ORM
{
    /**
     * @var null|string
     */
    public $jwt = null;
    /**
     * @var array|null
     */
    public $baseURL = null;
    /**
     * @var null|UniRequest
     */
    public $uniRequest = null;
    /**
     * @var null|UniBody
     */
    public $uniBody = null;
    /**
     * @var array
     */
    public $headers = ['Accept' => 'application/json'];
    /**
     * @var null|string
     */
    protected $authURL = null;
    /**
     * @var null|string
     */
    protected $secret = null;


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
        $this->authenticate();
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
            $this->jwt = $token;
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
