<?php

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 4:49 PM
 */

namespace OpenResourceManager\Client;

/**
 * ORM Service Account Client
 *
 * Communicates with an ORM API to preform service account operations.
 *
 * @license MIT
 * @license https://raw.githubusercontent.com/OpenResourceManager/client-php/master/LICENSE MIT License
 * @author Alex Markessinis
 */
class ServiceAccount extends Client
{
    /**
     * Base Service Account Route
     *
     * The base API route for the service account client.
     *
     * @var string
     */
    protected $route = 'service-accounts';

    /**
     * Get Service Account List
     *
     * Gets a list of service accounts.
     *
     * @return \Unirest\Response
     */
    public function getList()
    {
        return parent::getList();
    }

    /**
     * Get Service Account
     *
     * Gets a service account by it's ID.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function get($id)
    {
        return parent::get($id);
    }

    /**
     * Get Service Account From Username
     *
     * Gets a service account by it's username.
     *
     * @param string $username
     * @return \Unirest\Response
     */
    public function getFromUsername($username)
    {
        $slug = implode('/', ['username', $username]);
        return $this->_get($slug);
    }

    /**
     * Get Service Account From Identifier
     *
     * Gets a service account by it's identifier.
     *
     * @param string $identifier
     * @return \Unirest\Response
     */
    public function getFromIdentifier($identifier)
    {
        $slug = implode('/', ['identifier', $identifier]);
        return $this->_get($slug);
    }

}