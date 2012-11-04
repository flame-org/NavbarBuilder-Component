#NavbarBuilder-Component [![Build Status](https://secure.travis-ci.org/flame-org/NavbarBuilder-Component.png?branch=master)](https://travis-ci.org/flame-org/NavbarBuilder-Component)

## About
Nette Framework component for simple building of navigation (used TwitterBootstrap)

## Installation

Preferred way of installation is using [Composer](http://getcomposer.org).
Add the following dependency to your `composer.json` file and you're ready to go.

```json
{
	"require": {
		"flame/navbarbuilder-component": "dev-master"
	}
}
```

## Usage

###In config.neon

	services:
		NavbarBuilderControlFactory: Flame\Components\NavbarBuilder\NavbarBuilderControlFactory
		...

###In base presenter
```php
	/**
	 * @var \Flame\Components\NavbarBuilder\NavbarBuilderControlFactory $navbarBuilderControlFactory
	 */
	private $navbarBuilderControlFactory;

	/**
	 * @param \Flame\Components\NavbarBuilder\NavbarBuilderControlFactory $navbarBuilderControlFactory
	 */
	public function injectNavbarBuilderControlFactory(\Flame\Components\NavbarBuilder\NavbarBuilderControlFactory $navbarBuilderControlFactory)
	{
		$this->navbarBuilderControlFactory = $navbarBuilderControlFactory;
	}

	/**
	 * @return \Flame\Components\NavbarBuilder\NavbarBuilderControl
	 */
	protected function createComponentNavbarBuilder()
	{
		$control = $this->navbarBuilderControlFactory->create();
		$control->setTitle('Dashboard', 'Dashboard:');

		$navbar = $control->getNavbarControl();
		$navbar->addNavbarItem('Posts', 'Post:');
		$navbar->addNavbarItem('List', 'Post:', 'Posts');
		$navbar->addNavbarItem('Import', 'Import:', 'Posts', true);
		$navbar->addNavbarItem('Comments', 'Comment:', 'Posts');

		$navbar->addNavbarItem('Newsreel', 'Newsreel:');
		$navbar->addNavbarItem('Images', 'Image:');

		$userbar = $control->getUserbarControl();
		$userbar->addItem('Account settings', 'User:edit');
		$userbar->addItem('Password edit', 'User:password');
		$userbar->setUserName($this->getUser()->getIdentity());

		return $control;
	}
```

###In template (e.g. @layout.latte)

	{control navbarBuilder}