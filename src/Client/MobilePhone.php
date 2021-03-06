<?php

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 2:30 PM
 */

namespace OpenResourceManager\Client;

/**
 * ORM Mobile Phone Client
 *
 * Communicates with an ORM API to preform mobile phone operations.
 *
 * @license MIT
 * @license https://raw.githubusercontent.com/OpenResourceManager/client-php/master/LICENSE MIT License
 * @author Alex Markessinis
 */
class MobilePhone extends Client
{

    /**
     * Base Mobile Phone Route
     *
     * The base API route for the mobile phone client.
     *
     * @var string
     */
    protected $route = 'mobile-phones';

    /**
     * Get Mobile Phone List
     *
     * Gets a list of mobile phones.
     *
     * @return \Unirest\Response
     */
    public function getList()
    {
        return parent::getList();
    }

    /**
     * Get Mobile Phone
     *
     * Gets a mobile phone by it's ID.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function get($id)
    {
        return parent::get($id);
    }

    /**
     * Get Mobile Phones Owned By Account
     *
     * Gets a list of mobile phones owned by an account using it's ID.
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
     * Get Mobile Phones Owned By Account From Identifier
     *
     * Gets a list of mobile phones owned by an account using it's identifier.
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
     * Get Mobile Phones Owned By Account From Username
     *
     * Gets a list of mobile phones owned by an account using it's username.
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
     * Get Verified Mobile Phones
     *
     * Gets a list of mobile phones that are verified.
     *
     * @return \Unirest\Response
     */
    public function getVerified()
    {
        return $this->_get('verified');
    }

    /**
     * Get Verified Mobile Phones Owned By An Account
     *
     * Gets a list of mobile phones that are verified and owned by the specified account id.
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
     * Get Unverified Mobile Phones
     *
     * Gets a list of mobile phones that are unverified.
     *
     * @return \Unirest\Response
     */
    public function getUnverified()
    {
        return $this->_get('unverified');
    }

    /**
     * Get Unverified Mobile Phones Owned By An Account
     *
     * Gets a list of mobile phones that are unverified and owned by the specified account id.
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
     * Get Mobile Phones That Belong To A Carrier
     *
     * Gets a list of mobile phones that belong to a mobile carrier.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function getForCarrier($id)
    {
        $slug = implode('/', ['mobile-carrier/id', $id]);
        return $this->_get($slug);
    }

    /**
     * Get Mobile Phones That Belong To A Carrier From Code
     *
     * Gets a list of mobile phones that belong to a mobile carrier by the mobile carrier code.
     *
     * @param string $code
     * @return \Unirest\Response
     */
    public function getForCarrierCode($code)
    {
        $slug = implode('/', ['mobile-carrier/code', $code]);
        return $this->_get($slug);
    }

    /**
     * Create Or Update Mobile Phone
     *
     * Create or update a mobile phone, based the phone number.
     * An account ID, identifier, or username can be provided to associate the mobile phone with an account.
     *
     * @param int $account_id
     * @param string $identifier
     * @param string $username
     * @param string $number
     * @param string $country_code
     * @param int $mobile_carrier_id
     * @param string $mobile_carrier_code
     * @param boolean $verified
     * @param string $upstream_app_name
     * @param string $verification_callback
     * @return \Unirest\Response
     */
    public function store(
        $account_id = null,
        $identifier = null,
        $username = null,
        $number,
        $country_code = null,
        $mobile_carrier_id = null,
        $mobile_carrier_code = null,
        $verified = null,
        $upstream_app_name = null,
        $verification_callback = null
    )
    {
        $fields = [];
        //@todo validate params, throw exception when they are missing
        if (!is_null($account_id)) $fields['account_id'] = $account_id;
        if (!is_null($identifier)) $fields['identifier'] = $identifier;
        if (!is_null($username)) $fields['username'] = $username;
        $fields['number'] = $number;
        if (!is_null($country_code)) $fields['country_code'] = $country_code;
        if (!is_null($mobile_carrier_id)) $fields['mobile_carrier_id'] = $mobile_carrier_id;
        if (!is_null($mobile_carrier_code)) $fields['mobile_carrier_code'] = $mobile_carrier_code;
        if (!is_null($verified)) $fields['verified'] = $verified;
        if (!is_null($upstream_app_name)) $fields['upstream_app_name'] = $upstream_app_name;
        if (!is_null($verification_callback)) $fields['verification_callback'] = $verification_callback;

        return $this->_post($fields);
    }

    /**
     * Delete A Mobile Phone
     *
     * Delete a mobile phone based on it's ID.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function delete($id)
    {
        return parent::delete($id);
    }
}