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

    /**
     * Store Service Account
     *
     * Create or update a service account, by either it's username, identifier.
     *
     * @param string $identifier
     * @param string $username
     * @param string $name_first
     * @param string $name_last
     * @param boolean $should_propagate_password
     * @param string $password
     * @param int $account_id
     * @param string $account_identifier
     * @param string $account_username
     * @param DateTime $expires_at
     * @param boolean $disabled
     * @return \Unirest\Response
     */
    public function store(
        $identifier,
        $username,
        $name_first,
        $name_last,
        $should_propagate_password = null,
        $password = null,
        $account_id = null,
        $account_identifier = null,
        $account_username = null,
        $expires_at = null,
        $disabled = null
    )
    {
        $fields = [];
        //@todo validate params, throw exception when they are missing
        $fields['identifier'] = $identifier;
        $fields['username'] = $username;
        $fields['name_first'] = $name_first;
        $fields['name_last'] = $name_last;
        if (!is_null($should_propagate_password)) $fields['should_propagate_password'] = $should_propagate_password;
        if (!is_null($password)) $fields['password'] = $password;
        if (!is_null($account_id)) $fields['account_id'] = $account_id;
        if (!is_null($account_identifier)) $fields['account_identifier'] = $account_identifier;
        if (!is_null($account_username)) $fields['account_username'] = $account_username;
        if (!is_null($expires_at)) $fields['expires_at'] = strftime('%F %R', $expires_at);
        if (!is_null($disabled)) $fields['disabled'] = $disabled;

        return $this->_post($fields);
    }

    /**
     * Delete Service Account
     *
     * Delete a service account by it's ID.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function delete($id)
    {
        return parent::delete($id);
    }

    /**
     * Delete Service Account From Username
     *
     * Delete a service account by it's username.
     *
     * @param string $username
     * @return \Unirest\Response
     */
    public function deleteFromUsername($username)
    {
        return parent::deleteFromUsername($username);
    }

    /**
     * Delete Service Account From Identifier
     *
     * Delete a service account by it's identifier.
     *
     * @param string $identifier
     * @return \Unirest\Response
     */
    public function deleteFromIdentifier($identifier)
    {
        return parent::deleteFromIdentifier($identifier);
    }
}