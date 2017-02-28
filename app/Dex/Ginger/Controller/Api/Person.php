<?php
/**
 * Created by PhpStorm.
 * User: dex
 * Date: 2/28/17
 * Time: 3:50 PM
 */

namespace Dex\Ginger\Controller\Api;

use Dex\Ginger\Model\Person as PersonModel;
use Dex\Ginger\Model\Person\Collection as PersonModelCollection;

class Person
{

    /**
     * @var PersonModel
     */
    protected $person = null;

    /**
     * @var PersonModelCollection|null
     */
    protected $list = null;

    public function __construct($route,$request) {

        if ( $request != null ) {
            $this->person = new PersonModel($route, $request);

        } else {
            $this->list = new PersonModelCollection();
        }

        $this->_render();
    }

    protected function _render() {
        if ( $this->person != null ) {
            $view = $this->person;
        } else {
            $view = $this->list;
        }

        print_r($view);
    }
}