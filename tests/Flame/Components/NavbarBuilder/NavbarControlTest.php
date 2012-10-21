<?php
/**
 * NavbarControlTest.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    20.10.12
 */

namespace Flame\Tests\Components\NavbarBuilder;

class NavbarControlTest extends \Flame\Tests\TestCase
{

	/**
	 * @var \Flame\Components\NavbarBuilder\NavbarControl
	 */
	private $navbarControl;

	public function setUp()
	{
		$this->navbarControl = new \Flame\Components\NavbarBuilder\NavbarControl();
	}

	public function testAddNavbarItem()
	{
		$this->assertAttributeCount(0, 'navbarItems', $this->navbarControl);

		$this->navbarControl->addNavbarItem('google', 'google.com');
		$this->assertAttributeNotEmpty('navbarItems', $this->navbarControl);
		$this->assertAttributeEquals(array('google' => array('link' => 'google.com', 'subItems' => array())),
			'navbarItems', $this->navbarControl);
	}

	public function testAddNavbarItemWithParent()
	{
		$this->assertAttributeCount(0, 'navbarItems', $this->navbarControl);

		$this->navbarControl->addNavbarItem('google', '#');
		$this->navbarControl->addNavbarItem('google cz', 'google.cz', 'google');
		$this->assertAttributeNotEmpty('navbarItems', $this->navbarControl);

		$this->assertAttributeEquals(array('google' => array('link' => '#', 'subItems' => array('google cz' => array('link' => 'google.cz', 'separated' => false)))),
			'navbarItems', $this->navbarControl);
	}

	public function testGetObjectItems()
	{
		$getObjectItemsMethod = new \ReflectionMethod('\Flame\Components\NavbarBuilder\NavbarControl', 'getObjectItems');
		$getObjectItemsMethod->setAccessible(true);

		$this->assertInstanceOf('\Nette\ArrayHash', $getObjectItemsMethod->invoke($this->navbarControl));
		$this->assertCount(0, $getObjectItemsMethod->invoke($this->navbarControl));
	}

}
