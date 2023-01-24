## Installation

The kata uses:

- [PHP 8.0+](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org)

Install all the dependencies using composer

```sh
cd php

composer install
```

## Folders

- `run.php` - run from the command line
- `src` - contains the two classes:
      - `Item.php` - this class should **not** be changed
      - `GildedRose.php` - this class needs to be refactored, and the new feature added
- `tests` - contains the tests
      - `GildedRoseTest.php` - test

## Execution

To run from the root directory:

```sh
php run.php 10
```

> Change **10** to the required days.

## Scripts

```sh
composer tests         # run tests
composer test-coverage # generate HTML coverage > xdebug extension is required!
composer check-cs      # check code standards (style, code & PSR-12 rules)
composer fix-cs        # fix code using ECS
composer phpstan       # check code using PHPStan
```
