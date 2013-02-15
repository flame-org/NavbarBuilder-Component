#NavbarBuilder-Component [![Build Status](https://secure.travis-ci.org/flame-org/NavbarBuilder-Component.png?branch=master)](https://travis-ci.org/flame-org/NavbarBuilder-Component)

## About
Nette Framework component for simple building of navigation (used TwitterBootstrap)

## Installation

Preferred way of installation is using [Composer](http://getcomposer.org).
Add the following dependency to your `composer.json` file and you're ready to go.

```json
{
	"require": {
		"flame/navbarbuilder-component": "@dev"
	}
}
```

## Usage

###In config.neon

	factories:
		navbarBuilderControl:
            implement: \Flame\Components\NavbarBuilder\INavbarBuilderControlFactory
		...

###In base presenter
```php
	/**
	 * @autowire
	 * @var \Flame\Components\NavbarBuilder\INavbarBuilderControlFactory
	 */
	protected $navbarBuilderControlFactory;

	/**
	 * @return \Flame\Components\NavbarBuilder\NavbarBuilderControl
	 */
	protected function createComponentNavbarBuilder()
	{
		$control = $this->navbarBuilderControlFactory->create();
		$control->setTitle('Dashboard', 'Dashboard:');

		$navbar = $control->getNavbarControl();
		$navbar->addItem('Posts', 'Post:');
		$navbar->addItem('List', 'Post:', 'Posts');
		$navbar->addItem('Import', 'Import:', 'Posts', true);
		$navbar->addItem('Comments', 'Comment:', 'Posts');

		$navbar->addItem('Newsreel', 'Newsreel:');
		$navbar->addItem('Images', 'Image:');

		$userbar = $control->getUserbarControl();
		$userbar->addItem('Account settings', 'User:edit');
		$userbar->addItem('Password edit', 'User:password');
		$userbar->setUserName($this->getUser()->getIdentity());

		return $control;
	}
```

###In template (e.g. @layout.latte)

	{control navbarBuilder}