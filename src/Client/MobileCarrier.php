<?php namespace OpenResourceManager\Client;

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 2:33 PM
 */

/**
 *  ORM Mobile Carrier Client
 *
 * Communicates with an ORM API to preform mobile phone operations.
 *
 * @author Alex Markessinis
 */
class MobileCarrier extends Client
{

    /**
     * @var string
     */
    protected $route = 'mobile-carriers';

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