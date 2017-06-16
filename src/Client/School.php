<?php

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 4:35 PM
 */

namespace OpenResourceManager\Client;

/**
 * ORM School Client
 *
 * Communicates with an ORM API to preform school operations.
 *
 * @license MIT
 * @license https://raw.githubusercontent.com/OpenResourceManager/client-php/master/LICENSE MIT License
 * @author Alex Markessinis
 */
class School extends Client
{
    /**
     * Base School Route
     *
     * The base API route for the school client.
     *
     * @var string
     */
    protected $route = 'schools';

    /**
     * Get School List
     *
     * Gets a list of load schools.
     *
     * @return \Unirest\Response
     */
    public function getList()
    {
        return parent::getList();
    }

    /**
     * Get School
     *
     * Gets a school by it's ID.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function get($id)
    {
        return parent::get($id);
    }

    /**
     * Get School From Code
     *
     * Gets a school by it's code.
     *
     * @param string $code
     * @return \Unirest\Response
     */
    public function getFromCode($code)
    {
        return parent::getFromCode($code);
    }

}