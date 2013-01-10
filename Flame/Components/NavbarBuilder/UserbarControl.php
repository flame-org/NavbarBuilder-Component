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
	 * @var string
	 */
	protected $templatePath = '/templates/UserbarControl.latte';

	/**
	 * @var array
	 */
	private $menuItems = array();

	/**
	 * @var string
	 */
	private $userName;

	/**
	 * @param $path
	 * @return string
	 */
	public function setTemplatePath($path)
	{
		return $this->templatePath = (string) $path;
	}

	/**
	 * @param $name
	 * @param string $link
	 * @param null $tBootstrapIcon
	 */
	public function addItem($name, $link = '#', $tBootstrapIcon = null)
	{
		$this->menuItems[] = array('label' => $name, 'link' => $link, 'icon' => $tBootstrapIcon);
	}

	/**
	 * @param $name
	 * @return string
	 */
	public function setUserName($name)
	{
		return $this->userName = (string) $name;
	}

	public function render()
	{
		$this->template->setFile(__DIR__ . $this->templatePath);
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
