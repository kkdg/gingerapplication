<?php
/**
 * Created by PhpStorm.
 * User: dex
 * Date: 2/28/17
 * Time: 3:20 PM
 */

namespace Dex\Ginger\Model;

use Dex\Ginger\Model\Model as BaseModel;

class Group extends BaseModel
{
    /**
     * @var
     */
    protected $name;

    /**
     * @var
     */
    protected $member = array();

    /**
     * @var
     */
    public $message;

    public function __construct($request = null) {
        parent::__construct();

        if ( $request->name ) {
            $this->load($request->name);

        }
    }

    protected function load($name){

        $group = $this->model->loadGroup($name);
        if( $group['id'] == 0 ) {
            $this->message = ['message' =>"No group found"];
        } else {
            $this->message = ['message' =>"Fetch Success"];

            $this->name = $group['name'];
            $this->member = $group['member'];

        }

        $this->_purge();
    }

    protected function _purge() {
        $this->db = null;
        $this->model = null;

    }
}