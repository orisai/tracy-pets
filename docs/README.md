# Tracy Pets

[Tracy](https://tracy.nette.org) got an angry pet to remind you of your failures

## Content

- [Setup](#setup)
- [Usage](#usage)

## Setup

Install with [Composer](https://getcomposer.org)

```sh
composer require orisai/tracy-pets
```

Register extension

```neon
extensions:
	orisai.tracyPets: OriNette\TracyPets\DI\TracyPetsExtension
```

Or if you use just Tracy

```php
use OriNette\TracyPets\Tracy\TracyPetsPanel;
use Tracy\Debugger;

Debugger::getBlueScreen()->addPanel(new TracyPetsPanel());
```

## Usage

1. Throw an exception
2. Enjoy! 🎉

![Tracy screenshot](assets/screenshot.webp)
