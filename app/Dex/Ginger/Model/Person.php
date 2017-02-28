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
    protected $lasttname;

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


    public function __construct($request = null) {

        if ( $request->name ) {
            $this->load($request->name);
        }
    }

    protected function load($name){


    }
}