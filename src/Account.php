<?php namespace OpenResourceManager\Client;

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 1:07 PM
 */

/**
 *  ORM Account Clint
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
     * @param int $id
     * @return mixed
     */
    public function get($id = 0)
    {
        $slug = implode('/', [$this->route, $id]);
        return $this->_get($slug);
    }

    /**
     * @param string $username
     * @return mixed
     */
    public function getFromUsername($username = '')
    {
        $slug = implode('/', [$this->route, 'username', $username]);
        return $this->_get($slug);
    }

    /**
     * @param string $identifier
     * @return mixed
     */
    public function getFromIdentifier($identifier = '')
    {
        $slug = implode('/', [$this->route, 'identifer', $identifier]);
        return $this->_get($slug);
    }

}