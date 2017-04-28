<?php namespace OpenResourceManager\Client;

use Exception;
use OpenResourceManager\ORM;

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 8:48 PM
 */

/**
 *  Client
 *
 * Base ORM Client.
 *
 * @author Alex Markessinis
 */
class Client
{

    /**
     * @var array|null
     */
    public $baseURL = null;

    /**
     * @var null|string
     */
    protected $route = null;

    /**
     * @var null|ORM
     */
    protected $orm = null;

    /**
     * @var array
     */
    protected $validCodes = [200, 201, 204];

    /**
     * Client constructor.
     * @param ORM $orm
     */
    function __construct(ORM $orm)
    {
        $this->orm = $orm;
        $this->baseURL = $orm->baseURL;
        if (!empty($this->route)) {
            $this->baseURL[] = $this->route;
            $this->baseURL[] = '/';
        }
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
     * @param string $slug
     * @return mixed
     * @throws Exception
     */
    public function _get($slug = '')
    {
        // Build a url from the slug that was passed in
        $url = $this->urlFromRoute($slug);
        // Send a post request to the API
        $response = $this->orm->uniRequest::get($url, $this->orm->headers);
        // Check that we get 200 back
        if (in_array($response->code, $this->validCodes)) {
            // Return the parsed body
            return $response->body;
        } else {
            // If the token has expired
            if ($response->code == 401 && $response->body->message == 'Token has expired') {
                // Authenticate again
                $this->orm->authenticate();
                // Try the request again
                return $this->_get($slug);
            } else {
                // If we did not get 200/201/204/401 throw an exception
                throw  new Exception($response->body->message, $response->code);
            }
        }
    }

    /**
     * @param array $fields
     * @param string $slug
     * @return mixed
     * @throws Exception
     */
    public function _post($fields = [], $slug = '')
    {
        //Build the form data
        $data = $this->orm->uniBody::Form($fields);
        // Build a url from the slug that was passed in
        $url = $this->urlFromRoute($slug);
        // Send a post request to the API
        $response = $this->orm->uniRequest::post($url, $this->orm->headers, $data);
        // Check that we get 200 back
        if (in_array($response->code, $this->validCodes)) {
            // Return the parsed body
            return $response->body;
        } else {
            // If the token has expired
            if ($response->code == 401 && $response->body->message == 'Token has expired') {
                // Authenticate again
                $this->orm->authenticate();
                // Try the request again
                return $this->_post($fields, $slug);
            } else {
                // If we did not get 200/201/204/401 throw an exception
                throw  new Exception($response->body->message, $response->code);
            }
        }
    }

    /**
     * @param array $fields
     * @param string $slug
     * @return mixed
     * @throws Exception
     */
    public function _del($fields = [], $slug = '')
    {
        //Build the form data
        $data = $this->orm->uniBody::Form($fields);
        // Build a url from the slug that was passed in
        $url = $this->urlFromRoute($slug);
        // Send a post request to the API
        $response = $this->orm->uniRequest::delete($url, $this->orm->headers, $data);
        // Check that we get 200 back
        if (in_array($response->code, $this->validCodes)) {
            // Return the parsed body
            return $response->body;
        } else {
            // If the token has expired
            if ($response->code == 401 && $response->body->message == 'Token has expired') {
                // Authenticate again
                $this->orm->authenticate();
                // Try the request again
                return $this->_del($fields, $slug);
            } else {
                // If we did not get 200/201/204/401 throw an exception
                throw  new Exception($response->body->message, $response->code);
            }
        }
    }

    /**
     * @return mixed
     */
    protected function getList()
    {
        return $this->_get()->data;
    }

    /**
     * @param int $id
     * @return mixed
     */
    protected function get($id = 0)
    {
        return $this->_get($id)->data;
    }

    /**
     * @param string $code
     * @return mixed
     */
    protected function getFromCode($code = '')
    {
        $slug = implode('/', ['code', $code]);
        return $this->_get($slug)->data;
    }

}