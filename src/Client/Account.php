<?php

/**
 * Created by PhpStorm.
 * User: melon
 * Date: 4/27/17
 * Time: 1:07 PM
 */

namespace OpenResourceManager\Client;

use DateTime;

/**
 * ORM Account Client
 *
 * Communicates with an ORM API to preform account operations.
 *
 * @license MIT
 * @license https://raw.githubusercontent.com/OpenResourceManager/client-php/master/LICENSE MIT License
 * @author Alex Markessinis
 */
class Account extends Client
{
    /**
     * Base Account Route
     *
     * The base API route for the account client.
     *
     * @var string
     */
    protected $route = 'accounts';

    /**
     * Get Account List
     *
     * Gets a list of accounts.
     *
     * @return \Unirest\Response
     */
    public function getList()
    {
        return parent::getList();
    }

    /**
     * Get Account
     *
     * Gets an account by it's ID.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function get($id = 0)
    {
        return parent::get($id);
    }

    /**
     * Get Account From Username
     *
     * Gets an account by it's username.
     *
     * @param string $username
     * @return \Unirest\Response
     */
    public function getFromUsername($username = '')
    {
        $slug = implode('/', ['username', $username]);
        return $this->_get($slug);
    }

    /**
     * Get Account From Identifier
     *
     * Gets an account by it's identifier.
     *
     * @param string $identifier
     * @return \Unirest\Response
     */
    public function getFromIdentifier($identifier = '')
    {
        $slug = implode('/', ['identifier', $identifier]);
        return $this->_get($slug);
    }

    /**
     * Get Account List for Load Status
     *
     * Gets a list of accounts by the load status id.
     *
     * @param int $id
     * @return \Unirest\Response
     */
    public function getForLoadStatus($id = 0)
    {
        $slug = implode('/', ['load-status', $id]);
        return $this->_get($slug);
    }

    /**
     * Get Account List for Load Status Code
     *
     * Gets a list of accounts by te load status code.
     *
     * @param string $code
     * @return \Unirest\Response
     */
    public function getForLoadStatusCode($code = '')
    {
        $slug = implode('/', ['load-status', 'code', $code]);
        return $this->_get($slug);
    }

    /**
     * Store Account
     *
     * Create or update an account, by either it's ID, identifier.
     *
     * @param $identifier
     * @param $username
     * @param $name_prefix
     * @param $name_first
     * @param $name_middle
     * @param $name_last
     * @param $name_postifx
     * @param $name_phonetic
     * @param $primary_duty_id
     * @param $primary_duty_code
     * @param $ssn
     * @param $should_propagate_password
     * @param $password
     * @param DateTime $expires_at
     * @param $disabled
     * @param DateTime $birth_date
     * @param $load_status_code
     * @param $load_status_id
     * @return \Unirest\Response
     */
    public function store($identifier, $username, $name_prefix, $name_first, $name_middle, $name_last, $name_postifx, $name_phonetic, $primary_duty_id, $primary_duty_code, $ssn, $should_propagate_password, $password, DateTime $expires_at, $disabled, DateTime $birth_date, $load_status_code, $load_status_id)
    {
        $fields = [];

        if (!is_null($identifier)) {
            $fields['identifier'] = $identifier;
        }

        if (!is_null($username)) {
            $fields['username'] = $username;
        }

        if (!is_null($name_prefix)) {
            $fields['name_prefix'] = $name_prefix;
        }

        if (!is_null($name_first)) {
            $fields['name_first'] = $name_first;
        }

        if (!is_null($name_middle)) {
            $fields['name_middle'] = $name_middle;
        }

        if (!is_null($name_middle)) {
            $fields['name_middle'] = $name_middle;
        }

        if (!is_null($name_last)) {
            $fields['name_last'] = $name_last;
        }

        if (!is_null($name_postifx)) {
            $fields['name_postifx'] = $name_postifx;
        }

        if (!is_null($name_phonetic)) {
            $fields['name_phonetic'] = $name_phonetic;
        }

        if (!is_null($primary_duty_id)) {
            $fields['primary_duty_id'] = $primary_duty_id;
        }

        if (!is_null($primary_duty_code)) {
            $fields['primary_duty_code'] = $primary_duty_code;
        }

        if (!is_null($load_status_id)) {
            $fields['load_status_id'] = $load_status_id;
        }

        if (!is_null($load_status_code)) {
            $fields['load_status_code'] = $load_status_code;
        }

        if (!is_null($ssn)) {
            $fields['ssn'] = $ssn;
        }

        if (!is_null($should_propagate_password)) {
            $fields['should_propagate_password'] = $should_propagate_password;
        }

        if (!is_null($password)) {
            $fields['password'] = $password;
        }

        if (!is_null($expires_at)) {
            $fields['expires_at'] = strftime('%F %R', $expires_at);
        }

        if (!is_null($disabled)) {
            $fields['disabled'] = $disabled;
        }

        if (!is_null($birth_date)) {
            $fields['birth_date'] = strftime('%F', $birth_date);
        }

        return $this->_post($fields);
    }

    /**
     * Update Account
     *
     * update an account, by either it's ID, identifier.
     *
     * @param $identifier
     * @param $username
     * @param $name_prefix
     * @param $name_first
     * @param $name_middle
     * @param $name_last
     * @param $name_postifx
     * @param $name_phonetic
     * @param $primary_duty_id
     * @param $primary_duty_code
     * @param $ssn
     * @param $should_propagate_password
     * @param $password
     * @param DateTime $expires_at
     * @param $disabled
     * @param DateTime $birth_date
     * @param $load_status_code
     * @param $load_status_id
     * @return \Unirest\Response
     */
    public function patch($identifier, $username, $name_prefix, $name_first, $name_middle, $name_last, $name_postifx, $name_phonetic, $primary_duty_id, $primary_duty_code, $ssn, $should_propagate_password, $password, DateTime $expires_at, $disabled, DateTime $birth_date, $load_status_code, $load_status_id)
    {
        $fields = [];

        if (!is_null($identifier)) {
            $fields['identifier'] = $identifier;
        }

        if (!is_null($username)) {
            $fields['username'] = $username;
        }

        if (!is_null($name_prefix)) {
            $fields['name_prefix'] = $name_prefix;
        }

        if (!is_null($name_first)) {
            $fields['name_first'] = $name_first;
        }

        if (!is_null($name_middle)) {
            $fields['name_middle'] = $name_middle;
        }

        if (!is_null($name_middle)) {
            $fields['name_middle'] = $name_middle;
        }

        if (!is_null($name_last)) {
            $fields['name_last'] = $name_last;
        }

        if (!is_null($name_postifx)) {
            $fields['name_postifx'] = $name_postifx;
        }

        if (!is_null($name_phonetic)) {
            $fields['name_phonetic'] = $name_phonetic;
        }

        if (!is_null($primary_duty_id)) {
            $fields['primary_duty_id'] = $primary_duty_id;
        }

        if (!is_null($primary_duty_code)) {
            $fields['primary_duty_code'] = $primary_duty_code;
        }

        if (!is_null($load_status_id)) {
            $fields['load_status_id'] = $load_status_id;
        }

        if (!is_null($load_status_code)) {
            $fields['load_status_code'] = $load_status_code;
        }

        if (!is_null($ssn)) {
            $fields['ssn'] = $ssn;
        }

        if (!is_null($should_propagate_password)) {
            $fields['should_propagate_password'] = $should_propagate_password;
        }

        if (!is_null($password)) {
            $fields['password'] = $password;
        }

        if (!is_null($expires_at)) {
            $fields['expires_at'] = strftime('%F %R', $expires_at);
        }

        if (!is_null($disabled)) {
            $fields['disabled'] = $disabled;
        }

        if (!is_null($birth_date)) {
            $fields['birth_date'] = strftime('%F', $birth_date);
        }

        return $this->_patch($fields);
    }

    /**
     * Delete Account
     *
     * Delete an account by either it's ID, identifier, or username.
     *
     * @param int $id
     * @param string $identifier
     * @param string $username
     * @return \Unirest\Response
     */
    public function delete($id, $identifier, $username)
    {
        $fields = [];

        if (!is_null($id)) {
            $fields['id'] = $id;
        }

        if (!is_null($identifier)) {
            $fields['identifier'] = $identifier;
        }

        if (!is_null($username)) {
            $fields['username'] = $username;
        }

        return $this->_del($fields);
    }

    /**
     * Detach Account From Duty
     *
     * Detach this account from a duty. Using either the account ID, identifier, or username with either the duty ID or code.
     *
     * @param int $id
     * @param string $identifier
     * @param string $username
     * @param int $duty_id
     * @param string $code
     * @return \Unirest\Response
     */
    public function detachFromDuty($id, $identifier, $username, $duty_id, $code)
    {
        $fields = [];

        if (!is_null($id)) {
            $fields['id'] = $id;
        }

        if (!is_null($identifier)) {
            $fields['identifier'] = $identifier;
        }

        if (!is_null($username)) {
            $fields['username'] = $username;
        }

        if (!is_null($duty_id)) {
            $fields['duty_id'] = $duty_id;
        }

        if (!is_null($code)) {
            $fields['code'] = $code;
        }

        return $this->_del($fields, 'duty');
    }

    /**
     * Attach Account To Duty
     *
     * Attach this account to a duty. Using either the account ID, identifier, or username with either the duty ID or code.
     *
     * @param $id
     * @param $identifier
     * @param $username
     * @param $duty_id
     * @param $code
     * @return \Unirest\Response
     */
    public function attachToDuty($id, $identifier, $username, $duty_id, $code)
    {
        $fields = [];

        if (!is_null($id)) {
            $fields['id'] = $id;
        }

        if (!is_null($identifier)) {
            $fields['identifier'] = $identifier;
        }

        if (!is_null($username)) {
            $fields['username'] = $username;
        }

        if (!is_null($duty_id)) {
            $fields['duty_id'] = $duty_id;
        }

        if (!is_null($code)) {
            $fields['code'] = $code;
        }

        return $this->_post($fields, 'duty');
    }

    /**
     * Detach Account From Course
     *
     * Detach this account from a course. Using either the account ID, identifier, or username with either the course ID or code.
     *
     * @param $id
     * @param $identifier
     * @param $username
     * @param $course_id
     * @param $code
     * @return \Unirest\Response
     */
    public function detachFromCourse($id, $identifier, $username, $course_id, $code)
    {
        $fields = [];

        if (!is_null($id)) {
            $fields['id'] = $id;
        }

        if (!is_null($identifier)) {
            $fields['identifier'] = $identifier;
        }

        if (!is_null($username)) {
            $fields['username'] = $username;
        }

        if (!is_null($course_id)) {
            $fields['course_id'] = $course_id;
        }

        if (!is_null($code)) {
            $fields['code'] = $code;
        }

        return $this->_del($fields, 'course');
    }

    /**
     * Attach Account To Course
     *
     * Attach this account to a course. Using either the account ID, identifier, or username with either the course ID or code.
     *
     * @param $id
     * @param $identifier
     * @param $username
     * @param $course_id
     * @param $code
     * @return \Unirest\Response
     */
    public function attachToCourse($id, $identifier, $username, $course_id, $code)
    {
        $fields = [];

        if (!is_null($id)) {
            $fields['id'] = $id;
        }

        if (!is_null($identifier)) {
            $fields['identifier'] = $identifier;
        }

        if (!is_null($username)) {
            $fields['username'] = $username;
        }

        if (!is_null($course_id)) {
            $fields['course_id'] = $course_id;
        }

        if (!is_null($code)) {
            $fields['code'] = $code;
        }

        return $this->_post($fields, 'course');
    }

    /**
     * Detach Account From Department
     *
     * Detach this account from a department. Using either the account ID, identifier, or username with either the department ID or code.
     *
     * @param $id
     * @param $identifier
     * @param $username
     * @param $department_id
     * @param $code
     * @return \Unirest\Response
     */
    public function detachFromDepartment($id, $identifier, $username, $department_id, $code)
    {
        $fields = [];

        if (!is_null($id)) {
            $fields['id'] = $id;
        }

        if (!is_null($identifier)) {
            $fields['identifier'] = $identifier;
        }

        if (!is_null($username)) {
            $fields['username'] = $username;
        }

        if (!is_null($department_id)) {
            $fields['department_id'] = $department_id;
        }

        if (!is_null($code)) {
            $fields['code'] = $code;
        }

        return $this->_del($fields, 'department');
    }

    /**
     * Attach Account To Department
     *
     * Attach this account to a department. Using either the account ID, identifier, or username with either the department ID or code.
     *
     * @param $id
     * @param $identifier
     * @param $username
     * @param $department_id
     * @param $code
     * @return \Unirest\Response
     */
    public function attachToDepartment($id, $identifier, $username, $department_id, $code)
    {
        $fields = [];

        if (!is_null($id)) {
            $fields['id'] = $id;
        }

        if (!is_null($identifier)) {
            $fields['identifier'] = $identifier;
        }

        if (!is_null($username)) {
            $fields['username'] = $username;
        }

        if (!is_null($department_id)) {
            $fields['department_id'] = $department_id;
        }

        if (!is_null($code)) {
            $fields['code'] = $code;
        }

        return $this->_post($fields, 'department');
    }

    /**
     * Detach Account From Room
     *
     * Detach this account from a room. Using either the account ID, identifier, or username with either the room ID or code.
     *
     * @param $id
     * @param $identifier
     * @param $username
     * @param $room_id
     * @param $code
     * @return \Unirest\Response
     */
    public function detachFromRoom($id, $identifier, $username, $room_id, $code)
    {
        $fields = [];

        if (!is_null($id)) {
            $fields['id'] = $id;
        }

        if (!is_null($identifier)) {
            $fields['identifier'] = $identifier;
        }

        if (!is_null($username)) {
            $fields['username'] = $username;
        }

        if (!is_null($room_id)) {
            $fields['room_id'] = $room_id;
        }

        if (!is_null($code)) {
            $fields['code'] = $code;
        }

        return $this->_del($fields, 'room');
    }

    /**
     * Attach Account To Room
     *
     * Attach this account to a room. Using either the account ID, identifier, or username with either the room ID or code.
     *
     * @param $id
     * @param $identifier
     * @param $username
     * @param $room_id
     * @param $code
     * @return \Unirest\Response
     */
    public function attachToRoom($id, $identifier, $username, $room_id, $code)
    {
        $fields = [];

        if (!is_null($id)) {
            $fields['id'] = $id;
        }

        if (!is_null($identifier)) {
            $fields['identifier'] = $identifier;
        }

        if (!is_null($username)) {
            $fields['username'] = $username;
        }

        if (!is_null($room_id)) {
            $fields['room_id'] = $room_id;
        }

        if (!is_null($code)) {
            $fields['code'] = $code;
        }

        return $this->_post($fields, 'room');
    }

}