<?php namespace OpenResourceManager\Client;

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 4:32 PM
 */

/**
 *  ORM Building Client
 *
 * Communicates with an ORM API to preform building operations.
 *
 * @author Alex Markessinis
 */
class Building extends Client
{
    /**
     * @var string
     */
    protected $route = 'buildings';

    /**
     * @return \Unirest\Response
     */
    public function getList()
    {
        return parent::getList();
    }

    /**
     * @param int $id
     * @return \Unirest\Response
     */
    public function get($id = 0)
    {
        return parent::get($id);
    }

    /**
     * @param string $code
     * @return \Unirest\Response
     */
    public function getFromCode($code = '')
    {
        return parent::getFromCode($code);
    }

}