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

	/**
	 * @var array
	 */
	private $navbarItems = array();

	/**
	 * @param $label
	 * @param string $link
	 * @param null $parent
	 * @param bool $seperated
	 * @param null $tBootstrapIcon
	 */
	public function addNavbarItem($label, $link = '#', $parent = null, $seperated = false, $tBootstrapIcon = null)
	{

		if($parent !== null){
			if(isset($this->navbarItems[$parent])){
				$this->navbarItems[$parent]['subItems'][$label] = array('link' => $link, 'separated' => $seperated, 'icon' => $tBootstrapIcon);
				return;
			}
		}

		$this->navbarItems[$label] = array('link' => $link, 'subItems' => array(), 'icon' => $tBootstrapIcon);
	}

	public function render()
	{
		$this->template->setFile(__DIR__ . '/templates/NavbarControl.latte');
		$this->template->menuItems = $this->getObjectItems();
		$this->template->render();
	}

	public function renderCustom()
	{
		$this->template->setFile(__DIR__ . '/templates/NavbarControlCustom.latte');
		$this->template->menuItems = $this->getObjectItems();
		$this->template->render();
	}

	/**
	 * @return \Nette\ArrayHash
	 */
	protected function getObjectItems()
	{
		return \Nette\ArrayHash::from($this->navbarItems);
	}

}
