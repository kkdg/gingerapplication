<?php
/**
 * Created by PhpStorm.
 * User: dex
 * Date: 2/28/17
 * Time: 3:19 PM
 */

namespace Dex\Ginger\Model;

require_once __DIR__ . '/Model.php';

use Dex\Ginger\Model\Model as BaseModel;

class Address extends BaseModel
{

    /**
     * @var
     */
    protected $book;

    /**
     * @var
     */
    public $message;

    public function __construct($name, $router = null) {
        parent::__construct();

        if ( $router == null ) {
            $this->listAddressBook();
        } else if ( $router == 'add_group' ) {
            $this->addGroup($name);
        } else if ( $router == 'add_person' ) {
            $this->addPerson($name);
        }
    }

    protected function listAddressBook() {
        $this->book = $this->listAddressBookInDB();

        $this->purge();
    }

    protected function addGroup($name) {
        $this->message = $this->addGroupToBook($name);

        $this->purge();
    }

    protected function addPerson($name) {
        $this->message = $this->addPersonToBook($name);

        $this->purge();

    }

    protected function purge() {
        $this->db = null;
        $this->model = null;
    }
}