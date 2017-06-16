<?php

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 4:48 PM
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
class Room extends Client
{
    /**
     * Base Room Route
     *
     * The base API route for the room client.
     *
     * @var string
     */
    protected $route = 'rooms';

    /**
     * Get Room List
     *
     * Gets a list of rooms.
     *
     * @return \Unirest\Response
     */
    public function getList()
    {
        return parent::getList();
    }

    /**
     * Get Room
     *
     * Gets a room by it's ID.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function get($id)
    {
        return parent::get($id);
    }

    /**
     * Get Room From Code
     *
     * Gets a room by it's code.
     *
     * @param string $code
     * @return \Unirest\Response
     */
    public function getFromCode($code)
    {
        return parent::getFromCode($code);
    }

    /**
     * Delete Room
     *
     * Delete a room by it's id.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function delete($id)
    {
        return parent::delete($id);
    }

    /**
     * Delete Room From Code
     *
     * Deletes a room by it's code.
     *
     * @param string $code
     * @return \Unirest\Response
     */
    public function deleteFromCode($code)
    {
        return parent::deleteFromCode($code);
    }
}