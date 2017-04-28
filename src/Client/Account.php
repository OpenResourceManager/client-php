<?php namespace OpenResourceManager\Client;

use DateTime;

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 1:07 PM
 */

/**
 *  ORM Account Client
 *
 * Communicates with an ORM API to preform account operations.
 *
 * @author Alex Markessinis
 */
class Account extends Client
{

    /**
     * @var string
     */
    protected $route = 'accounts';

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
     * @param string $username
     * @return mixed
     */
    public function getFromUsername($username = '')
    {
        $slug = implode('/', ['username', $username]);
        return $this->_get($slug)->data;
    }

    /**
     * @param string $identifier
     * @return mixed
     */
    public function getFromIdentifier($identifier = '')
    {
        $slug = implode('/', ['identifier', $identifier]);
        return $this->_get($slug)->data;
    }


    /**
     * @param string $identifier
     * @param string $username
     * @param string $name_prefix
     * @param string $name_first
     * @param string $name_middle
     * @param string $name_last
     * @param string $name_postifx
     * @param string $name_phonetic
     * @param int $primary_duty_id
     * @param string $primary_duty_code
     * @param string $ssn
     * @param bool $should_propagate_password
     * @param string $password
     * @param DateTime $expires_at
     * @param bool $disabled
     * @param DateTime $birth_date
     */
    public function postAccount($identifier, $username, $name_prefix, $name_first, $name_middle, $name_last, $name_postifx, $name_phonetic, $primary_duty_id, $primary_duty_code, $ssn, $should_propagate_password, $password, DateTime $expires_at, $disabled, DateTime $birth_date)
    {
        $fields = [];

        if (!empty($identifier)) {
            $fields['identifier'] = $identifier;
        }

        if (!empty($username)) {
            $fields['username'] = $username;
        }

        if (!empty($name_prefix)) {
            $fields['name_prefix'] = $name_prefix;
        }

        if (!empty($name_first)) {
            $fields['name_first'] = $name_first;
        }

        if (!empty($name_middle)) {
            $fields['name_middle'] = $name_middle;
        }

        if (!empty($name_middle)) {
            $fields['name_middle'] = $name_middle;
        }

        if (!empty($name_last)) {
            $fields['name_last'] = $name_last;
        }

        if (!empty($name_postifx)) {
            $fields['name_postifx'] = $name_postifx;
        }

        if (!empty($name_phonetic)) {
            $fields['name_phonetic'] = $name_phonetic;
        }

        if (!empty($primary_duty_id)) {
            $fields['primary_duty_id'] = $primary_duty_id;
        }

        if (!empty($primary_duty_code)) {
            $fields['primary_duty_code'] = $primary_duty_code;
        }

        if (!empty($ssn)) {
            $fields['ssn'] = $ssn;
        }

        if (!empty($should_propagate_password)) {
            $fields['should_propagate_password'] = $should_propagate_password;
        }

        if (!empty($password)) {
            $fields['password'] = $password;
        }

        if (!empty($expires_at)) {
            $fields['expires_at'] = strftime('%F %R', $expires_at);
        }

        if (!empty($disabled)) {
            $fields['disabled'] = $disabled;
        }

        if (!empty($birth_date)) {
            $fields['birth_date'] = strftime('%F', $birth_date);
        }

        $this->_post($fields);
    }

}