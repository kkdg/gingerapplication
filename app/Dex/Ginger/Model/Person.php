<?php
/**
 * Created by PhpStorm.
 * User: dex
 * Date: 2/28/17
 * Time: 3:18 PM
 */

namespace Dex\Ginger\Model;

use Dex\Ginger\Model\Model as BaseModel;

class Person extends BaseModel
{
    /**
     * @var
     */
    protected $firstname;

    /**
     * @var
     */
    protected $lastname;

    /**
     * @var array
     */
    protected $address = array();

    /**
     * @var array
     */
    protected $email = array();

    /**
     * @var array
     */
    protected $phone_number = array();

    /**
     * @var
     */
    protected $groups;

    /**
     * @var
     */
    public $message;


    public function __construct($route, $request = null) {
        parent::__construct();

        if ( $route == 'email' ) {
            $this->loadByEmail($request->name);
        } else if ( $route == 'name' ) {
            $this->load($request->name);

        }
    }

    protected function load($name){

        $person = $this->model->loadPerson($name);

        $this->setObject($person);
    }

    protected function loadByEmail($name) {

        $person = $this->model->loadPersonByEmail($name);

        $this->setObject($person);

    }

    protected function setObject($person) {

        if( $person['id'] == 0 ) {
            $this->message = ['message' =>"No person found"];
        } else {
            $this->message = ['message' =>"Fetch Success"];

        }

        $this->firstname     = $person['firstname'];
        $this->lastname      = $person['lastname'];
        $this->address       = $person['address'];
        $this->email         = $person['email'];
        $this->phone_number  = $person['phone_number'];
        $this->groups        = $person['group'];

        $this->db = null;
        $this->model = null;

    }
}