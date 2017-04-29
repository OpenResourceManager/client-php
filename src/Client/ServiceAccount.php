<?php namespace OpenResourceManager\Client;

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 4:49 PM
 */

/**
 *  ORM Service Account Client
 *
 * Communicates with an ORM API to preform service account operations.
 *
 * @author Alex Markessinis
 */
class ServiceAccount extends Client
{
    /**
     * @var string
     */
    protected $route = 'service-accounts';

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
     * @param string $username
     * @return \Unirest\Response
     */
    public function getFromUsername($username = '')
    {
        $slug = implode('/', ['username', $username]);
        return $this->_get($slug);
    }

    /**
     * @param string $identifier
     * @return \Unirest\Response
     */
    public function getFromIdentifier($identifier = '')
    {
        $slug = implode('/', ['identifier', $identifier]);
        return $this->_get($slug);
    }

}