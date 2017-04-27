<?php namespace OpenResourceManager\Client;

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 4:35 PM
 */

/**
 *  ORM Course Client
 *
 * Communicates with an ORM API to preform course operations.
 *
 * @author Alex Markessinis
 */
class Course extends ORM
{
    /**
     * @var string
     */
    protected $route = 'course';

    /**
     * @return mixed
     */
    public function getList()
    {
        return parent::getList();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function get($id = 0)
    {
        return parent::get($id);
    }

    /**
     * @param string $code
     * @return mixed
     */
    public function getFromCode($code = '')
    {
        return parent::getFromCode($code);
    }

}