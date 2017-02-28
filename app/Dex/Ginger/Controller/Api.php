<?php
/**
 * Created by PhpStorm.
 * User: dex
 * Date: 2/28/17
 * Time: 3:28 PM
 */

namespace Dex\Ginger\Controller;

use Klein\Klein;

class Api
{
    /**
     * Base Router
     * @var float|null
     */
    protected $klein = null;

    public function __construct() {

        $klein = new Klein();

        $klein->respond('GET', '/api/person/[:name]', function ($request) {
            new \Dex\Ginger\Controller\Api\Person($request);
        });

        $klein->respond('GET', '/api/group/[:name]', function ($request) {
            new \Dex\Ginger\Controller\Api\Group($request);
        });

        /**
         * Main page
         * view is not included for brevity's sake
         */
        $klein->respond('GET', '/', function ($request) {
            return 'Welcome to Dex\Ginger application';
        });

        $klein->dispatch();
    }
}