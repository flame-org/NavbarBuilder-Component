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
	 * @var string
	 */
	protected $templatePath = '/templates/NavbarControl.latte';

	/**
	 * @var array
	 */
	private $navbarItems = array();

	/**
	 * @param $path
	 * @return string
	 */
	public function setTemplatePath($path)
	{
		return $this->templatePath = (string) $path;
	}

	/**
	 * @param $label
	 * @param string $link
	 * @param null $parent
	 * @param bool $seperated
	 */
	public function addNavbarItem($label, $link = '#', $parent = null, $seperated = false)
	{

		if($parent !== null){
			if(isset($this->navbarItems[$parent])){
				$this->navbarItems[$parent]['subItems'][$label] = array('link' => $link, 'separated' => $seperated);
				return;
			}
		}

		$this->navbarItems[$label] = array('link' => $link, 'subItems' => array());
	}

	public function render()
	{
		$this->template->setFile(__DIR__ . $this->templatePath);
		$this->template->menuItems = $this->getObjectItems();
		parent::render();
	}

	/**
	 * @return \Nette\ArrayHash
	 */
	protected function getObjectItems()
	{
		return \Nette\ArrayHash::from($this->navbarItems);
	}

}
