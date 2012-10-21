<?php
/**
 * NavbarBuilderControlTest.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    20.10.12
 */

namespace Flame\Tests\Components\NavbarBuilder;

class NavbarBuilderControlTest extends \Flame\Tests\TestCase
{

	/**
	 * @var \Flame\Components\NavbarBuilder\NavbarBuilderControl
	 */
	private $navbarBuilderControl;

	public function setUp()
	{
		$this->navbarBuilderControl = new \Flame\Components\NavbarBuilder\NavbarBuilderControl();
	}

	public function testSetTitle()
	{
		$this->assertAttributeEquals(null, 'title', $this->navbarBuilderControl);
		$this->navbarBuilderControl->setTitle('label');

		$this->assertAttributeEquals(\Nette\ArrayHash::from(array('label' => 'label', 'link' => '#')), 'title', $this->navbarBuilderControl);
	}

	public function testCreateComponentNavbar()
	{
		$createComponentMethod = new \ReflectionMethod('\Flame\Components\NavbarBuilder\NavbarBuilderControl', 'createComponentNavbar');
		$createComponentMethod->setAccessible(true);

		$this->assertEquals(new \Flame\Components\NavbarBuilder\NavbarControl(), $createComponentMethod->invoke($this->navbarBuilderControl));
	}

	public function testCreateComponentUserbar()
	{
		$createComponentMethod = new \ReflectionMethod('\Flame\Components\NavbarBuilder\NavbarBuilderControl', 'createComponentUserbar');
		$createComponentMethod->setAccessible(true);

		$this->assertEquals(new \Flame\Components\NavbarBuilder\UserbarControl(), $createComponentMethod->invoke($this->navbarBuilderControl));
	}

}
