<?php
/**
 * Created by PhpStorm.
 * User: dex
 * Date: 2/28/17
 * Time: 5:31 PM
 */

namespace Dex\Ginger\Model;

class Model
{

    /**
     * volatile session DB
     * @var null
     */
    protected $db = null;

    /**
     * Base Model for descendants
     * @var Model
     */
    protected $model;

    public function __construct() {

        if ( $_SESSION['db']['live'] != true ) { // you can reload DB with this statement
            $this->buildFixture();
        }
        $this->loadDb();
        $this->model = $this;
    }

    protected function loadPerson($name) {

        $name = strtolower($name);

        try {
            foreach ($this->db['person'] as $person) {
                $firstname = strtolower(str_replace(' ','',$person['firstname']));
                $lastname = strtolower(str_replace(' ','',$person['lastname']));
                $fullname = $firstname . $lastname;

                if ($firstname == $name
                    || $lastname == $name
                    || $fullname == $name
                ) {
                    $groups = array();
                    foreach ($person['group'] as $groupId) {
                        foreach( $this->db['group'] as $groupEntity) {
                           if ( $groupEntity['id'] == $groupId ) {
                               $groups[] = $groupEntity;
                           }
                        }
                    }
                    $person['group'] = $groups;

                    return $person;
                }
            }

            return ['id' => 0];

        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }

    protected function loadPersonByEmail($name) {

        $name = strtolower($name);

        try {
            foreach ($this->db['person'] as $person) {
                $personEmailEntity = strtolower($person['email']);

                $prefix = explode('@',$personEmailEntity)[0];
                if ($personEmailEntity == $name
                    || strpos($prefix, $name) !== false
                ) {
                    $groups = array();
                    foreach ($person['group'] as $groupId) {
                        foreach( $this->db['group'] as $groupEntity) {
                            if ( $groupEntity['id'] == $groupId ) {
                                $groups[] = $groupEntity;
                            }
                        }
                    }
                    $person['group'] = $groups;

                    return $person;
                }
            }

            return ['id' => 0];

        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }


    protected function loadGroup($name) {
        $name = strtolower($name);

        try {
            foreach ($this->db['group'] as $group) {

                if (strtolower($group['name']) == $name) {
                    $members = array();
                    foreach ($group['member'] as $memberId) {
                        foreach( $this->db['person'] as $personEntity) {
                            if ( $personEntity['id'] == $memberId ) {
                                $members[] = $personEntity;
                            }
                        }
                    }
                    $group['member'] = $members;

                    return $group;
                }
            }

            return ['id' => 0];

        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }

    protected function listAddressBookInDB() {
        return $this->db['address_book'];
    }

    protected function addGroupToBook($name) {
        $group = $this->loadGroup($name);
        try {
            $this->db['address_book']['group'][] = $group;
            $_SESSION['db']['address_book']['group'][] = $group;

            return "Successfully Updated";
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

    }

    protected function addPersonToBook($name) {
        try {
            $person = $this->loadPerson($name);
            $this->db['address_book']['person'][] = $person;
            $_SESSION['db']['address_book']['person'][] = $person;

            return "Successfully Updated";

        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }

    protected function loadDb() {
        $this->db = $_SESSION['db'];
    }

    protected function buildFixture() {

        $_SESSION['db']['person'] =
            [
                [
                    'id'           => 1,
                    'lastname'     => 'Van Der Sar',
                    'firstname'    => 'Edwin',
                    'address'      => 'Amsterdam Station',
                    'email'        => 'piet@ginger.com',
                    'phone_number' => '0881211231',
                    'group'        => [1,2,3,4]

                ],
                [
                    'id'           => 2,
                    'lastname'     => 'Van Persi',
                    'firstname'    => 'Robin',
                    'address'      => 'Amsterdam Windmill',
                    'email'        => 'persi@ginger.com',
                    'phone_number' => '00123244578',
                    'group'        => [1,3]

                ],
                [
                    'id'           => 3,
                    'lastname'     => 'Van Nistelrooy',
                    'firstname'    => 'Ruud',
                    'address'      => 'Amsterdam Kioscop',
                    'email'        => 'nistel@ginger.com',
                    'phone_number' => '0881211231',
                    'group'        => [3,4]

                ],

            ];

        $_SESSION['db']['group'] =
            [
                [
                    'id'       => 1,
                    'name'     => 'Baseball',
                    'member'   => [1,2]
                ],
                [
                    'id'       => 2,
                    'name'     => 'Soccer',
                    'member'   => [1]
                ],
                [
                    'id'       => 3,
                    'name'     => 'Footbal',
                    'member'   => [1,2,3]
                ],
                [
                    'id'       => 4,
                    'name'     => 'Basketball',
                    'member'   => [1,3]
                ],

            ];

        $_SESSION['db']['address_book'] = null;

        $_SESSION['db']['live'] = true;
    }
}