<?php
/**
 * UserbarControlTest.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    19.10.12
 */

namespace Flame\Tests\Components\NavbarBuilder;

class UserbarControlTest extends \Flame\Tests\TestCase
{

	/**
	 * @var \Flame\Components\NavbarBuilder\UserbarControl
	 */
	private $userbarControl;

	public function setUp()
	{
		$this->userbarControl = new \Flame\Components\NavbarBuilder\UserbarControl();
	}

	public function testSetUserName()
	{
		//test default value
		$this->assertAttributeEquals(null, 'userName', $this->userbarControl);

		$this->userbarControl->setUserName('name');
		$this->assertAttributeEquals('name', 'userName', $this->userbarControl);
	}

	public function testAddItem()
	{
		$this->assertAttributeEquals(array(), 'menuItems', $this->userbarControl);

		$this->userbarControl->addItem('John', 'google.com');
		$this->assertAttributeEquals(array(0 => array('label' => 'John', 'link' => 'google.com')), 'menuItems', $this->userbarControl);
		$this->assertAttributeNotEmpty('menuItems', $this->userbarControl);
		$this->assertAttributeCount(1, 'menuItems', $this->userbarControl);
	}

	public function testGetObjectItems()
	{
		$getObjectItemsMethod = new \ReflectionMethod('\Flame\Components\NavbarBuilder\UserbarControl', 'getObjectItems');
		$getObjectItemsMethod->setAccessible(true);

		$this->assertInstanceOf('\Nette\ArrayHash', $getObjectItemsMethod->invoke($this->userbarControl));
		$this->assertCount(0, $getObjectItemsMethod->invoke($this->userbarControl));
	}

}
