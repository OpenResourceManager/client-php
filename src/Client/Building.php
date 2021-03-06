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

    /**
     * Store Building
     *
     * Create or update a building, by it's code.
     *
     * @param string $code
     * @param string $label
     * @param float $latitude
     * @param float $longitude
     * @param int $campus_id
     * @param string $campus_code
     * @return \Unirest\Response
     */
    public function store($code, $label, $latitude, $longitude, $campus_id = null, $campus_code = null)
    {
        $fields = [];

        //@todo validate params, throw exception when they are missing
        $fields['code'] = $code;
        $fields['label'] = $label;
        $fields['latitude'] = $latitude;
        $fields['longitude'] = $longitude;
        if (!is_null($campus_id)) $fields['campus_id'] = $campus_id;
        if (!is_null($campus_code)) $fields['campus_code'] = $campus_code;

        return $this->_post($fields);
    }

    /**
     * Delete Building
     *
     * Delete a building by it's id.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function delete($id)
    {
        return parent::delete($id);
    }

    /**
     * Delete Building From Code
     *
     * Deletes a building by it's code.
     *
     * @param string $code
     * @return \Unirest\Response
     */
    public function deleteFromCode($code)
    {
        return parent::deleteFromCode($code);
    }
}