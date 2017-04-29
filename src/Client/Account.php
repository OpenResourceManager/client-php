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
     * @param string $username
     * @return \Unirest\Response
     */
    public function getFromUsername($username = '')
    {
        $slug = implode('/', ['username', $username]);
        return $this->_get($slug);
    }

    /**
     * @param string $identifier
     * @return \Unirest\Response
     */
    public function getFromIdentifier($identifier = '')
    {
        $slug = implode('/', ['identifier', $identifier]);
        return $this->_get($slug);
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
     * @return \Unirest\Response
     */
    public function store($identifier, $username, $name_prefix, $name_first, $name_middle, $name_last, $name_postifx, $name_phonetic, $primary_duty_id, $primary_duty_code, $ssn, $should_propagate_password, $password, DateTime $expires_at, $disabled, DateTime $birth_date)
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