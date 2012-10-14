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
	protected $templatePath;

	/**
	 * @var array
	 */
	private $navbarItems = array();

	public function __construct()
	{
		parent::__construct();

		$this->templatePath = __DIR__ . '/templates/NavbarControl.latte';
	}

	/**
	 * @param $path
	 */
	public function setTemplatePath($path)
	{
		$this->templatePath = (string) $path;
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
		$this->template->setFile($this->templatePath);
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
