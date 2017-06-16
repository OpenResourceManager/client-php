<?php

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 2:33 PM
 */

namespace OpenResourceManager\Client;

/**
 * ORM Mobile Carrier Client
 *
 * Communicates with an ORM API to preform mobile phone operations.
 *
 * @license MIT
 * @license https://raw.githubusercontent.com/OpenResourceManager/client-php/master/LICENSE MIT License
 * @author Alex Markessinis
 */
class MobileCarrier extends Client
{

    /**
     * Base Mobile Carrier Route
     *
     * The base API route for the mobile carrier client.
     *
     * @var string
     */
    protected $route = 'mobile-carriers';

    /**
     * Get Mobile Carrier List
     *
     * Gets a list of mobile carriers.
     *
     * @return \Unirest\Response
     */
    public function getList()
    {
        return parent::getList();
    }

    /**
     * Get Mobile Carrier
     *
     * Gets a mobile carrier by it's ID.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function get($id)
    {
        return parent::get($id);
    }

    /**
     * Get Mobile Carrier From Code
     *
     * Gets an mobile carrier by it's code.
     *
     * @param string $code
     * @return \Unirest\Response
     */
    public function getFromCode($code)
    {
        return parent::getFromCode($code);
    }

    /**
     * Delete Mobile Carrier
     *
     * Delete a mobile carrier by it's id.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function delete($id)
    {
        return parent::delete($id);
    }

    /**
     * Delete Mobile Carrier From Code
     *
     * Deletes a mobile carrier by it's code.
     *
     * @param string $code
     * @return \Unirest\Response
     */
    public function deleteFromCode($code)
    {
        return parent::deleteFromCode($code);
    }
}