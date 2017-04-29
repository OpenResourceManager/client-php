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
     * @param int $id
     * @return \Unirest\Response
     */
    public function get($id = 0)
    {
        return parent::get($id);
    }

}