<?php

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 4:36 PM
 */

namespace OpenResourceManager\Client;

/**
 * ORM Department Client
 *
 * Communicates with an ORM API to preform department operations.
 *
 * @license MIT
 * @license https://raw.githubusercontent.com/OpenResourceManager/client-php/master/LICENSE MIT License
 * @author Alex Markessinis
 */
class Department extends Client
{
    /**
     * Base Department Route
     *
     * The base API route for the department client.
     *
     * @var string
     */
    protected $route = 'departments';

    /**
     * Get Department List
     *
     * Gets a list of departments.
     *
     * @return \Unirest\Response
     */
    public function getList()
    {
        return parent::getList();
    }

    /**
     * Get Department
     *
     * Gets a department by it's ID.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function get($id)
    {
        return parent::get($id);
    }

    /**
     * Get Department From Code
     *
     * Gets a department by it's code.
     *
     * @param string $code
     * @return \Unirest\Response
     */
    public function getFromCode($code)
    {
        return parent::getFromCode($code);
    }

    /**
     * Store Department
     *
     * Create or update a department, by it's code.
     *
     * @param string $code
     * @param string $label
     * @param boolean $academic
     * @return \Unirest\Response
     */
    public function store($code, $label, $academic)
    {
        $fields = [];

        $fields['code'] = $code;
        $fields['label'] = $label;
        $fields['academic'] = $academic;

        return $this->_post($fields);
    }

    /**
     * Delete Department
     *
     * Delete a department by it's id.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function delete($id)
    {
        return parent::delete($id);
    }

    /**
     * Delete Department From Code
     *
     * Deletes a department by it's code.
     *
     * @param string $code
     * @return \Unirest\Response
     */
    public function deleteFromCode($code)
    {
        return parent::deleteFromCode($code);
    }
}