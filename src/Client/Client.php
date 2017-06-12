<?php

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 8:48 PM
 */

namespace OpenResourceManager\Client;

use Exception;
use OpenResourceManager\ORM;

/**
 * ORM Base Client
 *
 * Base client used for communicating with the API.
 *
 * @license MIT
 * @license https://raw.githubusercontent.com/OpenResourceManager/client-php/master/LICENSE MIT License
 * @author Alex Markessinis
 */
class Client
{
    /**
     * Base API URL
     *
     * Base API URL comprised of environment variables passed to the ORM constructor.
     *
     * @var null|array
     */
    protected $baseURL = null;
    /**
     * Base Route
     *
     * The base API route for the current client.
     *
     * @var null|string
     */
    protected $route = null;
    /**
     * ORM Connection
     *
     * The current ORM connection.
     *
     * @var null|ORM
     */
    protected $orm = null;
    /**
     * Valid Response Codes
     *
     * Response codes that are used to determine if the api request was a success.
     *
     * @var null|array
     */
    protected $validCodes = null;

    /**
     * Client Constructor
     *
     * Constructs a client.
     *
     * @param ORM $orm
     */
    function __construct(ORM $orm)
    {
        $this->orm = $orm;
        $this->baseURL = $orm->baseURL;
        $this->validCodes = $this->orm->validCodes;
        if (!empty($this->route)) {
            $this->baseURL[] = $this->route;
            $this->baseURL[] = '/';
        }
    }

    /**
     * URL From Route
     *
     * Forms an API url from a route path.
     *
     * @param string $path
     * @return string
     */
    protected function urlFromRoute($path = '')
    {
        $url = $this->baseURL;
        $url[] = $path;
        return implode('', $url);
    }

    /**
     * _Get
     *
     * Performs a get request to a specified url slug.
     *
     * @param string $slug
     * @return \Unirest\Response
     * @throws Exception
     */
    protected function _get($slug = '')
    {
        // Build a url from the slug that was passed in
        $url = $this->urlFromRoute($slug);
        // Send a post request to the API
        $response = $this->orm->uniRequest->get($url, $this->orm->headers);
        // If the token has expired
        if ($response->code == 401 && $response->body->message == 'Token has expired') {
            // Authenticate again
            $this->orm->authenticate();
            // Try the request again
            return $this->_get($slug);
        } else {
            // Return the parsed body
            return $response;
        }
    }

    /**
     * _Post
     *
     * Performs a post request to a specified url slug.
     *
     * @param array $fields
     * @param string $slug
     * @return \Unirest\Response
     * @throws Exception
     */
    protected function _post($fields = [], $slug = '')
    {
        //Build the form data
        $data = $this->orm->uniBody->Form($fields);
        // Build a url from the slug that was passed in
        $url = $this->urlFromRoute($slug);
        // Send a post request to the API
        $response = $this->orm->uniRequest->post($url, $this->orm->headers, $data);
        // If the token has expired
        if ($response->code == 401 && $response->body->message == 'Token has expired') {
            // Authenticate again
            $this->orm->authenticate();
            // Try the request again
            return $this->_post($fields, $slug);
        } else {
            // Return the response
            return $response;
        }
    }

    /**
     * _Patch
     *
     * Performs a patch request to a specified url slug.
     *
     * @param array $fields
     * @param string $slug
     * @return \Unirest\Response
     * @throws Exception
     */
    protected function _patch($fields = [], $slug = '')
    {
        //Build the form data
        $data = $this->orm->uniBody->Form($fields);
        // Build a url from the slug that was passed in
        $url = $this->urlFromRoute($slug);
        // Send a post request to the API
        $response = $this->orm->uniRequest->patch($url, $this->orm->headers, $data);
        // If the token has expired
        if ($response->code == 401 && $response->body->message == 'Token has expired') {
            // Authenticate again
            $this->orm->authenticate();
            // Try the request again
            return $this->_post($fields, $slug);
        } else {
            // Return the parsed body
            return $response;
        }
    }

    /**
     * _Del
     *
     * Performs a delete request to a specified url slug.
     *
     * @param array $fields
     * @param string $slug
     * @return \Unirest\Response
     * @throws Exception
     */
    protected function _del($fields = [], $slug = '')
    {
        //Build the form data
        $data = $this->orm->uniBody->Form($fields);
        // Build a url from the slug that was passed in
        $url = $this->urlFromRoute($slug);
        // Send a post request to the API
        $response = $this->orm->uniRequest->delete($url, $this->orm->headers, $data);
        // If the token has expired
        if ($response->code == 401 && $response->body->message == 'Token has expired') {
            // Authenticate again
            $this->orm->authenticate();
            // Try the request again
            return $this->_del($fields, $slug);
        } else {
            // Return the parsed body
            return $response;
        }
    }

    /**
     * Get List
     *
     * Gets a list of objects.
     *
     * @return \Unirest\Response
     */
    protected function getList()
    {
        return $this->_get();
    }

    /**
     * Get
     *
     * Gets an object by it's ID.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    protected function get($id = 0)
    {
        return $this->_get($id);
    }

    /**
     * Get From Code
     *
     * Gets an object by it's Code.
     *
     * @param string $code
     * @return \Unirest\Response
     */
    protected function getFromCode($code = '')
    {
        $slug = implode('/', ['code', $code]);
        return $this->_get($slug);
    }

}