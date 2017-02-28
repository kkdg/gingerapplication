<?php
/**
 * Created by PhpStorm.
 * User: dex
 * Date: 2/28/17
 * Time: 8:22 PM
 */

namespace Dex\Ginger\Controller\Api;



use Dex\Ginger\Model\Address as AddressModel;
use Dex\Ginger\Model\Address\Collection as AddressModelCollection;


class Address
{

    protected $addressBook = null;


    protected $list = null;

    public function __construct($request, $router = null) {

        if ( $request != null ) {
            $this->addressBook = new AddressModel($request->name, $router);

        } else {
            // @todo: Need to implement collection specific class
            $this->list = new AddressModelCollection();
        }

        $this->_render();
    }

    protected function _render() {
        if ( $this->addressBook != null ) {
            $view = $this->addressBook;
        } else {
            $view = $this->list;
        }

        print_r($view);
    }
}
