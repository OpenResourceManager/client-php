<?php namespace OpenResourceManager\Client;

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 4:34 PM
 */

/**
 *  ORM Country Client
 *
 * Communicates with an ORM API to preform country operations.
 *
 * @author Alex Markessinis
 */
class Country extends Client
{
    /**
     * @var string
     */
    protected $route = 'countries';

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
     * @param string $code
     * @return mixed
     */
    public function getFromCode($code = '')
    {
        return parent::getFromCode($code);
    }

}