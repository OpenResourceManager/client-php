<?php namespace OpenResourceManager\Client;

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 4:38 PM
 */

/**
 *  ORM Resource Verification Client
 *
 * Communicates with an ORM API to preform resource verification operations.
 *
 * @author Alex Markessinis
 */
class ResourceVerification extends ORM
{
    /**
     * @var string
     */
    protected $route = 'verify';

    /**
     * @param string $token
     * @return mixed
     */
    public function getVerification($token = '')
    {
        return $this->_get($token)->data;
    }

}