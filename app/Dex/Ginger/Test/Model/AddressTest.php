<?php
/**
 * Created by PhpStorm.
 * User: dex
 * Date: 2/28/17
 * Time: 9:00 PM
 */
namespace Dex\Ginger\Test\Model;

session_start();

require_once __DIR__ . '/../../Model/Address.php';
require_once __DIR__ . '/../../Model/Model.php';

use Dex\Ginger\Model\Address as AddressModel;
use Dex\Ginger\Model\Address\Collection as AddressModelCollection;
use Klein\Klein;

class AddressTest extends \PHPUnit_Framework_TestCase
{


    /**
     * @var Context | \PHPUnit_Framework_MockObject_MockObject
     */
    protected $context;

    /**
     * @var ConfigInterface | \PHPUnit_Framework_MockObject_MockObject
     */
    protected $config;

    public function testA() {
        $model = new AddressModel('baseball','add_group');

        static::assertEquals(
            'Successfully Updated',
            $model->message
        );
    }

//    public function setUp()
//    {
//        $this->context = $this->getMockBuilder(Context::class)
//            ->disableOriginalConstructor()
//            ->getMock();
//        $this->config = $this->getMock(ConfigInterface::class);
//    }
//
//
//    public function testAddGroup() {
//        $this->config->expect(static::once())
//            ->method('addGroup')
//            ->
//    }

}