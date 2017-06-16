<?php

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 4:32 PM
 */

namespace OpenResourceManager\Client;

/**
 * ORM Building Client
 *
 * Communicates with an ORM API to preform building operations.
 *
 * @license MIT
 * @license https://raw.githubusercontent.com/OpenResourceManager/client-php/master/LICENSE MIT License
 * @author Alex Markessinis
 */
class Building extends Client
{
    /**
     * Base Building Route
     *
     * The base API route for the building client.
     *
     * @var string
     */
    protected $route = 'buildings';

    /**
     * Get Building List
     *
     * Gets a list of buildings.
     *
     * @return \Unirest\Response
     */
    public function getList()
    {
        return parent::getList();
    }

    /**
     * Get Building
     *
     * Gets a building by it's ID.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function get($id)
    {
        return parent::get($id);
    }

    /**
     * Get Building From Code
     *
     * Gets a building by it's code.
     *
     * @param string $code
     * @return \Unirest\Response
     */
    public function getFromCode($code)
    {
        return parent::getFromCode($code);
    }

}