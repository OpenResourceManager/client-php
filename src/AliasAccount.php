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
class AliasAccount extends ORM
{

    /**
     * @var string
     */
    protected $route = 'alias-accounts';

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
     * @param string $username
     * @return mixed
     */
    public function getFromUsername($username = '')
    {
        $slug = implode('/', ['username', $username]);
        return $this->_get($slug)->data;
    }

}