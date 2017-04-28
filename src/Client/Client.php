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
     * @param $slug
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
    public function _post($slug = '', $data)
    {
        // Build a url from the slug that was passed in
        $url = $this->urlFromRoute($slug);
        // Send a post request to the API
        $response = $this->orm->uniRequest::post($url, $this->orm->headers, $data);
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