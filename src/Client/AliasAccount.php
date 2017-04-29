<?php namespace OpenResourceManager\Client;

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 4:30 PM
 */

/**
 *  ORM Alias Account Client
 *
 * Communicates with an ORM API to preform alias account operations.
 *
 * @author Alex Markessinis
 */
class AliasAccount extends Client
{

    /**
     * @var string
     */
    protected $route = 'alias-accounts';

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

}