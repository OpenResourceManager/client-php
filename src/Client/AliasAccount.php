<?php

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 4:30 PM
 */

namespace OpenResourceManager\Client;

/**
 * ORM Alias Account Client
 *
 * Communicates with an ORM API to preform alias account operations.
 *
 * @license MIT
 * @license https://raw.githubusercontent.com/OpenResourceManager/client-php/master/LICENSE MIT License
 * @author Alex Markessinis
 */
class AliasAccount extends Client
{

    /**
     * Base Alias Account Route
     *
     * The base API route for the alias account client.
     *
     * @var string
     */
    protected $route = 'alias-accounts';

    /**
     * Get Alias Account List
     *
     * Gets a list of alias accounts.
     *
     * @return \Unirest\Response
     */
    public function getList()
    {
        return parent::getList();
    }

    /**
     * Get Alias Account
     *
     * Gets an alias account by it's ID.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function get($id = 0)
    {
        return parent::get($id);
    }

    /**
     * Get Alias Account From Username
     *
     * Gets an alias account by it's username.
     *
     * @param string $username
     * @return \Unirest\Response
     */
    public function getFromUsername($username = '')
    {
        $slug = implode('/', ['username', $username]);
        return $this->_get($slug);
    }

}