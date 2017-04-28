<?php namespace OpenResourceManager\Client;

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 4:29 PM
 */

/**
 *  ORM Address Client
 *
 * Communicates with an ORM API to preform address operations.
 *
 * @author Alex Markessinis
 */
class Addresses extends Client
{
    /**
     * @var string
     */
    protected $route = 'addresses';

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

}