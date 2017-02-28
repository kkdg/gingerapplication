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

    public function __construct() {
        if ( $_SESSION['db']['live'] != true ) {
            $this->buildFixture();
        }
    }

    protected function buildFixture() {

        $_SESSION['db']['person'] =
            [
                'firstname'    => 'Piet',
                'lastname'     => 'Van',
                'address'      => 'Amsterdam Station',
                'email'        => 'piet@ginger.com',
                'phone_number' => '0881211231',
                'group'        => ['Soccer', 'Baseball', 'Footbal', 'Basketball']


            ];

        $_SESSION['db']['live'] = true;
    }
}