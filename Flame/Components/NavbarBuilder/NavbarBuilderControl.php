<?php
/**
 * NavbarBuilderControl.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    14.10.12
 */

namespace Flame\Components\NavbarBuilder;

class NavbarBuilderControl extends \Flame\Application\UI\Control
{

	/**
	 * @var NavbarControl
	 */
	private $navbarControl;

	/**
	 * @var UserbarControl
	 */
	private $userbarControl;

	/**
	 * @var \Nette\ArrayHash
	 */
	private $title;

	/**
	 * @var string
	 */
	protected $templatePath;

	public function __construct()
	{
		parent::__construct();

		$this->navbarControl = new NavbarControl();
		$this->userbarControl = new UserbarControl();

		$this->templatePath = __DIR__ . '/templates/NavbarBuilderControl.latte';
	}

	/**
	 * @param $path
	 */
	public function setTemplatePath($path)
	{
		$this->templatePath = (string) $path;
	}

	/**
	 * @return NavbarControl
	 */
	public function getNavbarControl()
	{
		return $this->navbarControl;
	}

	/**
	 * @return UserbarControl
	 */
	public function getUserbarControl()
	{
		return $this->userbarControl;
	}

	/**
	 * @param $label
	 * @param string $link
	 */
	public function setTitle($label, $link = '#')
	{
		$this->title = \Nette\ArrayHash::from(array('label' => $label, 'link' => $link));
	}

	public function render()
	{
		$this->template->setFile($this->templatePath);
		$this->template->title = $this->title;
		parent::render();
	}

	/**
	 * @return NavbarControl
	 */
	protected function createComponentNavbar()
	{
		return $this->navbarControl;
	}

	/**
	 * @return UserbarControl
	 */
	protected function createComponentUserbar()
	{
		return $this->userbarControl;
	}

}
