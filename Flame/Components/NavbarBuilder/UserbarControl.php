<?php
/**
 * UserbarControl.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    14.10.12
 */

namespace Flame\Components\NavbarBuilder;

class UserbarControl extends \Flame\Application\UI\Control
{

	/**
	 * @var array
	 */
	private $menuItems = array();

	/**
	 * @var string
	 */
	private $userName;

	/**
	 * @param $name
	 * @param string $link
	 * @param int $priority
	 */
	public function addItem($name, $link = '#')
	{
		$this->menuItems[] = array('label' => $name, 'link' => $link);
	}

	/**
	 * @param $name
	 */
	public function setUserName($name)
	{
		$this->userName = (string) $name;
	}

	public function render()
	{
		$this->template->setFile(__DIR__ . '/UserbarControl.latte');
		$this->template->userName = $this->userName;
		$this->template->menuItems = $this->getObjectItems();
		parent::render();
	}

	/**
	 * @return \Nette\ArrayHash
	 */
	protected function getObjectItems()
	{
		return \Nette\ArrayHash::from($this->menuItems);
	}

}
