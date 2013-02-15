<?php
/**
 * NavbarBuilderControlFactory.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    14.10.12
 */

namespace Flame\Components\NavbarBuilder;

interface INavbarBuilderControlFactory
{

	/**
	 * @return NavbarBuilderControl
	 */
	public function create();

}
