<?php

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 4:37 PM
 */

namespace OpenResourceManager\Client;

/**
 * ORM Duty Client
 *
 * Communicates with an ORM API to preform duty operations.
 *
 * @license MIT
 * @license https://raw.githubusercontent.com/OpenResourceManager/client-php/master/LICENSE MIT License
 * @author Alex Markessinis
 */
class Duty extends Client
{
    /**
     * Base Duty Route
     *
     * The base API route for the duty client.
     *
     * @var string
     */
    protected $route = 'duties';

    /**
     * Get Duty List
     *
     * Gets a list of duties.
     *
     * @return \Unirest\Response
     */
    public function getList()
    {
        return parent::getList();
    }

    /**
     * Get Duty
     *
     * Gets a duty by it's ID.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function get($id = 0)
    {
        return parent::get($id);
    }

    /**
     * Get Duty From Code
     *
     * Gets a duty by it's code.
     *
     * @param string $code
     * @return \Unirest\Response
     */
    public function getFromCode($code = '')
    {
        return parent::getFromCode($code);
    }

    /**
     * Get Duties Owned For An Account
     *
     * Get a list of duties that an account is a member of by supplying it's ID.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function getForAccount($id = 0)
    {
        $slug = implode('/', ['account', $id]);
        return $this->_get($slug);
    }

    /**
     * Get Duties For An Account By Identifier
     *
     * Get a list of duties that an account is a member of by supplying it's identifier.
     *
     * @param string $identifier
     * @return \Unirest\Response
     */
    public function getForIdentifier($identifier = '')
    {
        $slug = implode('/', ['identifier', $identifier]);
        return $this->_get($slug);
    }

    /**
     * Get Duties For An Account By Username
     *
     * Get a list of duties that an account is a member of by supplying it's username.
     *
     * @param string $username
     * @return \Unirest\Response
     */
    public function getForUsername($username = '')
    {
        $slug = implode('/', ['username', $username]);
        return $this->_get($slug);
    }

}