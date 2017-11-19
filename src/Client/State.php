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
    public function get($id)
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
    public function getFromCode($code)
    {
        return parent::getFromCode($code);
    }

    public function store($code, $label, $country_id = null, $country_code = null)
    {
        $fields = [];
        //@todo validate params, throw exception when they are missing
        if (!is_null($country_id)) $fields['country_id'] = $country_id;
        if (!is_null($country_code)) $fields['country_code'] = $country_code;

        return parent::store($fields, $code, $label);
    }

    /**
     * Delete State
     *
     * Delete a state by it's id.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function delete($id)
    {
        return parent::delete($id);
    }

    /**
     * Delete State From Code
     *
     * Deletes a state by it's code.
     *
     * @param string $code
     * @return \Unirest\Response
     */
    public function deleteFromCode($code)
    {
        return parent::deleteFromCode($code);
    }
}