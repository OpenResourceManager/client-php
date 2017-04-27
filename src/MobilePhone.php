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
class MobilePhone extends ORM
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
        return $this->_get($slug)->data;
    }

    /**
     * @param string $identifier
     * @return mixed
     */
    public function getForIdentifier($identifier = '')
    {
        $slug = implode('/', ['identifier', $identifier]);
        return $this->_get($slug)->data;
    }

    /**
     * @param string $username
     * @return mixed
     */
    public function getForUsername($username = '')
    {
        $slug = implode('/', ['username', $username]);
        return $this->_get($slug)->data;
    }

    /**
     * @return mixed
     */
    public function getVerified()
    {
        return $this->_get('verified')->data;
    }

    /**
     * @return mixed
     */
    public function getUnverified()
    {
        return $this->_get('unverified')->data;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getForCarrier($id = 0)
    {
        $slug = implode('/', ['mobile-carrier/id', $id]);
        return $this->_get($slug)->data;
    }

    /**
     * @param string $code
     * @return mixed
     */
    public function getForCarrierCode($code = '')
    {
        $slug = implode('/', ['mobile-carrier/code', $code]);
        return $this->_get($slug)->data;
    }
}