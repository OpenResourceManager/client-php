<?php namespace OpenResourceManager\Client;

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 2:30 PM
 */

/**
 *  ORM Email Client
 *
 * Communicates with an ORM API to preform email operations.
 *
 * @author Alex Markessinis
 */
class Email extends Client
{

    /**
     * @var string
     */
    protected $route = 'emails';

    /**
     * @return \Unirest\Response
     */
    public function getList()
    {
        return parent::getList();
    }

    /**
     * @param int $id
     * @return \Unirest\Response
     */
    public function get($id = 0)
    {
        return parent::get($id);
    }

    /**
     * @param string $address
     * @return \Unirest\Response
     */
    public function getByAddress($address = '')
    {
        $slug = implode('/', ['address', $address]);
        return $this->_get($slug);
    }

    /**
     * @param int $id
     * @return \Unirest\Response
     */
    public function getForAccount($id = 0)
    {
        $slug = implode('/', ['account', $id]);
        return $this->_get($slug);
    }

    /**
     * @param string $identifier
     * @return \Unirest\Response
     */
    public function getForIdentifier($identifier = '')
    {
        $slug = implode('/', ['identifier', $identifier]);
        return $this->_get($slug);
    }

    /**
     * @param string $username
     * @return \Unirest\Response
     */
    public function getForUsername($username = '')
    {
        $slug = implode('/', ['username', $username]);
        return $this->_get($slug)->data;
    }

    /**
     * @return \Unirest\Response
     */
    public function getVerified()
    {
        return $this->_get('verified');
    }

    /**
     * @return \Unirest\Response
     */
    public function getUnverified()
    {
        return $this->_get('unverified');
    }

    /**
     * @param int $account_id
     * @param string $identifier
     * @param string $username
     * @param string $address
     * @param bool $verified
     * @return \Unirest\Response
     */
    public function store($account_id, $identifier, $username, $address, $verified)
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

        if (!is_null($address)) {
            $fields['address'] = $address;
        }

        if (!is_null($verified)) {
            $fields['verified'] = $verified;
        }

        return $this->_post($fields);
    }

    /**
     * @param int $id
     * @param string $address
     * @return \Unirest\Response
     */
    public function delete($id, $address)
    {
        $fields = [];

        if (!is_null($id)) {
            $fields['id'] = $id;
        }

        if (!is_null($address)) {
            $fields['address'] = $address;
        }

        return $this->_del($fields);
    }

}