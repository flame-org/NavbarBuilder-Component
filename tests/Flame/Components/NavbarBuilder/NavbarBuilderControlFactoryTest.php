<?php
/**
 * NavbarBuilderControlFactoryTest.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    20.10.12
 */

namespace Flame\Tests\Components\NavbarBuilder;

class NavbarBuilderControlFactoryTest extends \Flame\Tests\TestCase
{

	/**
	 * @var \Flame\Components\NavbarBuilder\NavbarBuilderControlFactory
	 */
	private $navbarBuliderControlFactory;

	public function setUp()
	{
		$this->navbarBuliderControlFactory = new \Flame\Components\NavbarBuilder\NavbarBuilderControlFactory();
	}

	public function testCreate()
	{
		$this->assertEquals(new \Flame\Components\NavbarBuilder\NavbarBuilderControl(), $this->navbarBuliderControlFactory->create());
	}

}
