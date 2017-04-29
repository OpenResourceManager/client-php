<?php

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 4:51 PM
 */

namespace OpenResourceManager\Client;

/**
 * ORM Room Client
 *
 * Communicates with an ORM API to preform room operations.
 *
 * @license MIT
 * @license https://raw.githubusercontent.com/OpenResourceManager/client-php/master/LICENSE MIT License
 * @author Alex Markessinis
 */
class State extends Client
{
    /**
     * Base State Route
     *
     * The base API route for the state client.
     *
     * @var string
     */
    protected $route = 'states';

    /**
     * Get State List
     *
     * Gets a list of states.
     *
     * @return \Unirest\Response
     */
    public function getList()
    {
        return parent::getList();
    }

    /**
     * Get State
     *
     * Gets a state by it's ID.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function get($id = 0)
    {
        return parent::get($id);
    }

    /**
     * Get State From Code
     *
     * Gets a state by it's code.
     *
     * @param string $code
     * @return \Unirest\Response
     */
    public function getFromCode($code = '')
    {
        return parent::getFromCode($code);
    }
}