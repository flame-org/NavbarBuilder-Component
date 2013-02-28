<?php
/**
 * NavbarControl.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    14.10.12
 */

namespace Flame\Components\NavbarBuilder;

class NavbarControl extends \Flame\Application\UI\Control
{

	/** @var array */
	private $navbarItems = array();

	/**
	 * @param $label
	 * @param string $link
	 */
	public function addItem($label, $link = '#')
	{
		$this->navbarItems[$label] = $link;
	}

	/**
	 * @return array
	 */
	public function getItems()
	{
		return $this->navbarItems;
	}

	public function render()
	{
		$this->template->menuItems = $this->getObjectItems();
		$this->template->setFile(__DIR__ . '/templates/NavbarControl.latte')->render();
	}

	public function renderCustom()
	{
		$this->template->menuItems = $this->getObjectItems();
		$this->template->setFile(__DIR__ . '/templates/Navbar.latte')->render();
	}

	/**
	 * @return \Nette\ArrayHash
	 */
	protected function getObjectItems()
	{
		return \Nette\ArrayHash::from($this->navbarItems);
	}

}
