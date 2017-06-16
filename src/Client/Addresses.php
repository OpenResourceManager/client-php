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
     * @param $id
     * @return \Unirest\Response
     */
    public function get($id)
    {
        return parent::get($id);
    }

    /**
     * Store Address
     *
     * Store an address.
     *
     * @param $account_id
     * @param $identifier
     * @param $username
     * @param $addressee
     * @param $organization
     * @param $line_1
     * @param $line_2
     * @param $city
     * @param $state_id
     * @param $state_code
     * @param $zip
     * @param $country_id
     * @param $country_code
     * @param $latitude
     * @param $longitude
     * @return \Unirest\Response
     */
    public function store($account_id, $identifier, $username, $addressee, $organization, $line_1, $line_2, $city, $state_id, $state_code, $zip, $country_id, $country_code, $latitude, $longitude)
    {
        $fields = [];

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
     * @param $id
     * @return \Unirest\Response
     */
    public function delete($id)
    {
        return $this->_del(['id' => $id]);
    }
}