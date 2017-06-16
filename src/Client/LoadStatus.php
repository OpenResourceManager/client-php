<?php

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 4:35 PM
 */

namespace OpenResourceManager\Client;

/**
 * ORM Load Status Client
 *
 * Communicates with an ORM API to preform load status operations.
 *
 * @license MIT
 * @license https://raw.githubusercontent.com/OpenResourceManager/client-php/master/LICENSE MIT License
 * @author Alex Markessinis
 */
class LoadStatus extends Client
{
    /**
     * Base Load Status Route
     *
     * The base API route for the load status client.
     *
     * @var string
     */
    protected $route = 'load-statuses';

    /**
     * Get Load Status List
     *
     * Gets a list of load statuses.
     *
     * @return \Unirest\Response
     */
    public function getList()
    {
        return parent::getList();
    }

    /**
     * Get Load Status
     *
     * Gets a load status by it's ID.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function get($id)
    {
        return parent::get($id);
    }

    /**
     * Get Load Status From Code
     *
     * Gets a load status by it's code.
     *
     * @param string $code
     * @return \Unirest\Response
     */
    public function getFromCode($code)
    {
        return parent::getFromCode($code);
    }

}