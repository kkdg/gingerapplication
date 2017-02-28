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

        $klein->respond('GET', '/api/person/name/[:name]', function ($request) {
            new \Dex\Ginger\Controller\Api\Person('name',$request);
        });

        $klein->respond('GET', '/api/person/email/[:name]', function ($request) {
            new \Dex\Ginger\Controller\Api\Person('email',$request);
        });

        $klein->respond('GET', '/api/group/[:name]', function ($request) {
            new \Dex\Ginger\Controller\Api\Group($request);
        });

        $klein->respond('GET', '/api/address/list', function ($request) {
            new \Dex\Ginger\Controller\Api\Address($request);
        });

        /**
         * Add group to address book
         * You must provide group name which already exists in DB
         */
        $klein->respond('GET', '/api/address/group/[:name]', function ($request) {
            new \Dex\Ginger\Controller\Api\Address($request, 'add_group');
        });
        
        /**
         * Add person to address book
         * You must provide person name which already exists in DB
         */
        $klein->respond('GET', '/api/address/person/[:name]', function ($request) {
            new \Dex\Ginger\Controller\Api\Address($request, 'add_person');
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