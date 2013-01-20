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

class NavbarBuilderControlFactory extends \Nette\Object
{

	public function create($data = null)
	{
		$control = new NavbarBuilderControl();
		return $control;
	}

}
