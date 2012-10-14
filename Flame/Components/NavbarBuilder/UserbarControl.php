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
	protected $templatePath;

	/**
	 * @var string
	 */
	private $userName;

	public function __construct()
	{
		parent::__construct();

		$this->templatePath = __DIR__ . '/templates/UserbarControl.latte';
	}

	/**
	 * @param $path
	 */
	public function setTemplatePath($path)
	{
		$this->templatePath = (string) $path;
	}

	/**
	 * @param $name
	 * @param string $link
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
		$this->template->setFile($this->templatePath);
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
