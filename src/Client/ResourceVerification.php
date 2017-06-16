<?php

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 4:38 PM
 */

namespace OpenResourceManager\Client;

/**
 * ORM Resource Verification Client
 *
 * Communicates with an ORM API to preform resource verification operations.
 *
 * @license MIT
 * @license https://raw.githubusercontent.com/OpenResourceManager/client-php/master/LICENSE MIT License
 * @author Alex Markessinis
 */
class ResourceVerification extends Client
{
    /**
     * Base Route
     *
     * The base API route for the current client.
     *
     * @var string
     */
    protected $route = 'verify';

    /**
     * Verify Resource Through Get
     *
     * Verifies a resource token through a get request.
     *
     * @param string $token
     * @return \Unirest\Response
     */
    public function getVerification($token)
    {
        return $this->_get($token);
    }

    /**
     * Verify Resource Via Post
     *
     * Verifies a resource through a post request.
     *
     * @param string $token
     * @return \Unirest\Response
     */
    public function postVerification($token)
    {
        return $this->_post(['token' => $token]);
    }

}