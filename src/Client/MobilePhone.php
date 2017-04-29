<?php namespace OpenResourceManager\Client;

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 2:30 PM
 */

/**
 *  ORM Mobile Phone Client
 *
 * Communicates with an ORM API to preform mobile phone operations.
 *
 * @author Alex Markessinis
 */
class MobilePhone extends Client
{

    /**
     * @var string
     */
    protected $route = 'mobile-phones';

    /**
     * @return mixed
     */
    public function getList()
    {
        return parent::getList();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function get($id = 0)
    {
        return parent::get($id);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getForAccount($id = 0)
    {
        $slug = implode('/', ['account', $id]);
        return $this->_get($slug);
    }

    /**
     * @param string $identifier
     * @return mixed
     */
    public function getForIdentifier($identifier = '')
    {
        $slug = implode('/', ['identifier', $identifier]);
        return $this->_get($slug);
    }

    /**
     * @param string $username
     * @return mixed
     */
    public function getForUsername($username = '')
    {
        $slug = implode('/', ['username', $username]);
        return $this->_get($slug);
    }

    /**
     * @return mixed
     */
    public function getVerified()
    {
        return $this->_get('verified');
    }

    /**
     * @return mixed
     */
    public function getUnverified()
    {
        return $this->_get('unverified');
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getForCarrier($id = 0)
    {
        $slug = implode('/', ['mobile-carrier/id', $id]);
        return $this->_get($slug);
    }

    /**
     * @param string $code
     * @return mixed
     */
    public function getForCarrierCode($code = '')
    {
        $slug = implode('/', ['mobile-carrier/code', $code]);
        return $this->_get($slug);
    }

    /**
     * @param int $account_id
     * @param string $identifier
     * @param string $username
     * @param string $number
     * @param string $country_code
     * @param int $mobile_carrier_id
     * @param string $mobile_carrier_code
     * @param bool $verified
     * @return mixed
     */
    public function store($account_id, $identifier, $username, $number, $country_code, $mobile_carrier_id, $mobile_carrier_code, $verified)
    {

        $fields = [];

        if (!is_null($account_id)) {
            $fields['account_id'] = $account_id;
        }

        if (!is_null($identifier)) {
            $fields['identifier'] = $identifier;
        }

        if (!is_null($username)) {
            $fields['username'] = $username;
        }

        if (!is_null($number)) {
            $fields['number'] = $number;
        }

        if (!is_null($country_code)) {
            $fields['country_code'] = $country_code;
        }

        if (!is_null($mobile_carrier_id)) {
            $fields['mobile_carrier_id'] = $mobile_carrier_id;
        }

        if (!is_null($mobile_carrier_code)) {
            $fields['mobile_carrier_code'] = $mobile_carrier_code;
        }

        if (!is_null($verified)) {
            $fields['verified'] = $verified;
        }

        return $this->_post($fields);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete($id = 0)
    {
        return $this->_del(['id' => $id]);
    }
}