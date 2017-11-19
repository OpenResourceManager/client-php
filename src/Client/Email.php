<?php

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 2:30 PM
 */

namespace OpenResourceManager\Client;

/**
 * ORM Email Client
 *
 * Communicates with an ORM API to preform email operations.
 *
 * @license MIT
 * @license https://raw.githubusercontent.com/OpenResourceManager/client-php/master/LICENSE MIT License
 * @author Alex Markessinis
 */
class Email extends Client
{

    /**
     * Base Email Route
     *
     * The base API route for the email client.
     *
     * @var string
     */
    protected $route = 'emails';

    /**
     * Get Email List
     *
     * Gets a list of emails.
     *
     * @return \Unirest\Response
     */
    public function getList()
    {
        return parent::getList();
    }

    /**
     * Get Email
     *
     * Gets an email by it's ID.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function get($id)
    {
        return parent::get($id);
    }

    /**
     * Get Email From Address
     *
     * Gets an email by it's address.
     *
     * @param string $address
     * @return \Unirest\Response
     */
    public function getByAddress($address)
    {
        $slug = implode('/', ['address', $address]);
        return $this->_get($slug);
    }

    /**
     * Get Emails Owned By Account
     *
     * Get a list of emails owned by an account by supplying it's ID.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function getForAccount($id)
    {
        $slug = implode('/', ['account', $id]);
        return $this->_get($slug);
    }

    /**
     * Get Emails Owned By Account From Identifier
     *
     * Get a list of emails owned by an account by supplying it's identifier.
     *
     * @param string $identifier
     * @return \Unirest\Response
     */
    public function getForIdentifier($identifier)
    {
        $slug = implode('/', ['identifier', $identifier]);
        return $this->_get($slug);
    }

    /**
     * Get Emails Owned By Account From Username
     *
     * Get a list of emails owned by an account by supplying it's username.
     *
     * @param string $username
     * @return \Unirest\Response
     */
    public function getForUsername($username)
    {
        $slug = implode('/', ['username', $username]);
        return $this->_get($slug);
    }

    /**
     * Get Emails That Are Verified
     *
     * Get a list of emails that are verified.
     *
     * @return \Unirest\Response
     */
    public function getVerified()
    {
        return $this->_get('verified');
    }

    /**
     * Get Emails That Are Verified Owned By An Account
     *
     * Get a list of emails that are verified and owned by the specified account id.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function getVerifiedForAccount($id)
    {
        $slug = implode('/', ['verified', 'account', $id]);
        return $this->_get($slug);
    }

    /**
     * Get Emails That Are Unverified
     *
     * Get a list of emails that are unverified.
     *
     * @return \Unirest\Response
     */
    public function getUnverified()
    {
        return $this->_get('unverified');
    }

    /**
     * Get Emails That Are Unverified Owned By An Account
     *
     * Get a list of emails that are unverified and owned by the specified account id.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function getUnverifiedForAccount($id)
    {
        $slug = implode('/', ['unverified', 'account', $id]);
        return $this->_get($slug);
    }

    /**
     * Create An Email
     *
     * Create an email by supplying either an account_id, identifier, or username.
     *
     * @param int $account_id
     * @param string $identifier
     * @param string $username
     * @param string $address
     * @param boolean $verified
     * @param string $upstream_app_name
     * @param string $verification_callback
     * @param string $confirmation_from
     * @return \Unirest\Response
     */
    public function store(
        $account_id = null,
        $identifier = null,
        $username = null,
        $address,
        $verified = null,
        $upstream_app_name = null,
        $verification_callback = null,
        $confirmation_from = null
    )
    {
        $fields = [];
        //@todo validate params, throw exception when they are missing
        if (!is_null($account_id)) $fields['account_id'] = $account_id;
        if (!is_null($identifier)) $fields['identifier'] = $identifier;
        if (!is_null($username)) $fields['username'] = $username;
        $fields['address'] = $address;
        if (!is_null($verified)) $fields['verified'] = $verified;
        if (!is_null($upstream_app_name)) $fields['upstream_app_name'] = $upstream_app_name;
        if (!is_null($verification_callback)) $fields['verification_callback'] = $verification_callback;
        if (!is_null($confirmation_from)) $fields['confirmation_from'] = $confirmation_from;

        return parent::store($fields);
    }

    /**
     * Delete Email
     *
     * Delete a email by it's id.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function delete($id)
    {
        return parent::delete($id);
    }

    /**
     * Delete Email From Address
     *
     * Delete an email by supplying an address.
     *
     * @param int $id
     * @param string $address
     * @return \Unirest\Response
     */
    public function deleteFromAddress($id, $address)
    {
        return $this->_del(['address' => $address]);
    }
}