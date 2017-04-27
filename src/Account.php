<?php namespace OpenResourceManager\Client;

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 1:07 PM
 */

/**
 *  ORM Account Client
 *
 * Communicates with an ORM API to preform account operations.
 *
 * @author Alex Markessinis
 */
class Account extends ORM
{

    /**
     * @var string
     */
    protected $route = 'accounts';

    /**
     * @param string $username
     * @return mixed
     */
    public function getFromUsername($username = '')
    {
        $slug = implode('/', ['username', $username]);
        return $this->_get($slug)->data;
    }

    /**
     * @param string $identifier
     * @return mixed
     */
    public function getFromIdentifier($identifier = '')
    {
        $slug = implode('/', ['identifier', $identifier]);
        return $this->_get($slug)->data;
    }

}