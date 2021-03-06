<?php

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 4:29 PM
 */

namespace OpenResourceManager\Client;

/**
 * ORM Address Client
 *
 * Communicates with an ORM API to preform address operations.
 *
 * @license MIT
 * @license https://raw.githubusercontent.com/OpenResourceManager/client-php/master/LICENSE MIT License
 * @author Alex Markessinis
 */
class Addresses extends Client
{
    /**
     * Base Address Route
     *
     * The base API route for the address client.
     *
     * @var string
     */
    protected $route = 'addresses';

    /**
     * Get Address List
     *
     * Gets a list of addresses.
     *
     * @return \Unirest\Response
     */
    public function getList()
    {
        return parent::getList();
    }

    /**
     * Get Address
     *
     * Gets an address by it's ID.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function get($id)
    {
        return parent::get($id);
    }

    /**
     * Get Addresses Owned By Account
     *
     * Get a list of addresses owned by an account by supplying it's ID.
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
     * Get Addresses Owned By Account From Identifier
     *
     * Get a list of addresses owned by an account by supplying it's identifier.
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
     * Get Addresses Owned By Account From Username
     *
     * Get a list of addresses owned by an account by supplying it's username.
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
     * Store Address
     *
     * Store an address.
     *
     * @param int $account_id
     * @param string $identifier
     * @param string $username
     * @param string $addressee
     * @param string $organization
     * @param string $line_1
     * @param string $line_2
     * @param string $city
     * @param int $state_id
     * @param string $state_code
     * @param string $zip
     * @param int $country_id
     * @param string $country_code
     * @param string $latitude
     * @param string $longitude
     * @return \Unirest\Response
     */
    public function store(
        $account_id = null,
        $identifier = null,
        $username = null,
        $addressee = null,
        $organization = null,
        $line_1 = null,
        $line_2 = null,
        $city = null,
        $state_id = null,
        $state_code = null,
        $zip = null,
        $country_id = null,
        $country_code = null,
        $latitude = null,
        $longitude = null
    )
    {
        $fields = [];
        //@todo validate params, throw exception when they are missing
        if (!is_null($account_id)) $fields['account_id'] = $account_id;
        if (!is_null($identifier)) $fields['identifier'] = $identifier;
        if (!is_null($username)) $fields['username'] = $username;
        if (!is_null($addressee)) $fields['addressee'] = $addressee;
        if (!is_null($organization)) $fields['$organization'] = $organization;
        if (!is_null($line_1)) $fields['line_1'] = $line_1;
        if (!is_null($line_2)) $fields['line_2'] = $line_2;
        if (!is_null($city)) $fields['city'] = $city;
        if (!is_null($state_id)) $fields['state_id'] = $state_id;
        if (!is_null($state_code)) $fields['state_code'] = $state_code;
        if (!is_null($zip)) $fields['zip'] = $zip;
        if (!is_null($country_id)) $fields['country_id'] = $country_id;
        if (!is_null($country_code)) $fields['country_code'] = $country_code;
        if (!is_null($latitude)) $fields['latitude'] = $latitude;
        if (!is_null($longitude)) $fields['longitude'] = $longitude;

        return $this->_post($fields);
    }

    /**
     * Delete Address
     *
     * Delete an address by it's ID.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function delete($id)
    {
        return parent::delete($id);
    }
}