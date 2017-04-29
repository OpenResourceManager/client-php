<?php

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 4:34 PM
 */

namespace OpenResourceManager\Client;

/**
 * ORM Country Client
 *
 * Communicates with an ORM API to preform country operations.
 *
 * @license MIT
 * @license https://raw.githubusercontent.com/OpenResourceManager/client-php/master/LICENSE MIT License
 * @author Alex Markessinis
 */
class Country extends Client
{
    /**
     * Base Country Route
     *
     * The base API route for the country client.
     *
     * @var string
     */
    protected $route = 'countries';

    /**
     * Get Country List
     *
     * Gets a list of countries.
     *
     * @return \Unirest\Response
     */
    public function getList()
    {
        return parent::getList();
    }

    /**
     * Get Country
     *
     * Gets a country by it's ID.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function get($id = 0)
    {
        return parent::get($id);
    }

    /**
     * Get Country From Code
     *
     * Gets a country by it's code.
     *
     * @param string $code
     * @return \Unirest\Response
     */
    public function getFromCode($code = '')
    {
        return parent::getFromCode($code);
    }

}