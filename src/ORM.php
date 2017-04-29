<?php

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 10:29 AM
 */

namespace OpenResourceManager;
use Exception;
use Unirest\Request as UniRequest;
use Unirest\Request\Body as UniBody;

/**
 * ORM
 *
 * Base ORM class, used to set environment variables like API key and host and initiate and maintain an authenticated session.
 *
 * @license MIT
 * @license https://raw.githubusercontent.com/OpenResourceManager/client-php/master/LICENSE MIT License
 * @author Alex Markessinis
 */
class ORM
{
    /**
     * JSON Web Token
     *
     * The current JWT for the authenticated session.
     *
     * @var null|string
     */
    public $jwt = null;
    /**
     * Mashape Request
     *
     * Used to send API requests.
     *
     * @var null|UniRequest
     */
    public $uniRequest = null;
    /**
     * Mashape Request Body
     *
     * Used to decode API requests.
     *
     * @var null|UniBody
     */
    public $uniBody = null;
    /**
     * HTTP Headers
     *
     * The HTTP headers sent with each request to the API.
     *
     * @var array
     */
    public $headers = ['Accept' => 'application/json'];
    /**
     * Valid Response Codes
     *
     * Response codes that are used to determine if the api request was a success.
     *
     * @var array
     */
    public $validCodes = [200, 201, 202, 204];
    /**
     * Base API URL
     *
     * Base API URL comprised of environment variables passed to the constructor.
     *
     * @var null|array
     */
    public $baseURL = null;
    /**
     * Base Auth URL
     *
     * This URL is used to authenticate with the API.
     *
     * @var null|string
     */
    protected $authURL = null;
    /**
     * API Secret/Key
     *
     * The API key used to authenticate with the API.
     *
     * @var null|string
     */
    protected $secret = null;

    /**
     * ORM Constructor
     *
     * Constructs an authenticated ORM session.
     *
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
            throw new Exception('Empty ORM API secret was supplied. Grab your secret from the ORM API console.', 403);
        }
        // Build and set the base API url
        $this->baseURL = [($useHTTPS) ? 'https://' : 'http://', $apiHost, ':', $apiPort, '/api', '/v', $apiVersion, '/'];
        // Build the auth url
        $this->authURL = implode('', [($useHTTPS) ? 'https://' : 'http://', $apiHost, ':', $apiPort, '/api', '/v', $apiVersion, '/auth/']);
        // Create a new rest client object
        $this->uniRequest = new UniRequest();
        $this->uniBody = new UniBody();
        // Authenticate with the API
        $this->authenticate();
    }

    /**
     * Authenticate
     *
     * Authenticates with the API to initiate a JWT authenticated session.
     *
     * @return \Unirest\Response
     * @throws Exception
     */
    public function authenticate()
    {
        // Build the form data
        $data = $this->uniBody->Form(['secret' => $this->secret]);
        // Send a post request to the API
        $response = $this->uniRequest->post($this->authURL, $this->headers, $data);
        // Check that we get 20X back
        if (in_array($response->code, $this->validCodes)) {
            // Grab the jwt from the response body
            $token = $response->body->token;
            $this->jwt = $token;
            // Set the authorization header
            $this->headers['Authorization'] = implode(' ', ['Bearer', $token]);
            // Return the response
            return $response;
        } else {
            // If we did not get 20X throw an exception
            throw  new Exception($response->body->message, $response->code);
        }
    }

    /**
     * Validate Authenticated Session
     *
     * Validates the current JWT with with the API to determine if the session is still valid.
     *
     * @return \Unirest\Response
     * @throws Exception
     */
    public function validateAuth()
    {
        // Send a get request to the API
        $response = $this->uniRequest->get(implode([$this->authURL, 'validate/']), $this->headers);
        // Check that we get 20X back
        if (in_array($response->code, $this->validCodes)) {
            // Return the response
            return $response;
        } else {
            // If we did not get 20X throw an exception
            throw  new Exception($response->body->message, $response->code);
        }
    }
}
