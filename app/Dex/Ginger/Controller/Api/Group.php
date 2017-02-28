<?php
/**
 * Created by PhpStorm.
 * User: dex
 * Date: 2/28/17
 * Time: 3:50 PM
 */

namespace Dex\Ginger\Controller\Api;



use Dex\Ginger\Model\Group as GroupModel;
use Dex\Ginger\Model\Group\Collection as GroupModelCollection;


class Group
{

    protected $group = null;


    protected $list = null;

    public function __construct($request) {

        if ( $request != null ) {
            $this->group = new GroupModel($request);

        } else {
            $this->list = new GroupModelCollection();
        }

        $this->_render();
    }

    protected function _render() {
        if ( $this->group != null ) {
            $view = $this->group;
        } else {
            $view = $this->list;
        }

        print_r($view);
    }
}
