<p align="center">
    <a href="https://github.com/yii-extension" target="_blank">
        <img src="https://lh3.googleusercontent.com/ehSTPnXqrkk0M3U-UPCjC0fty9K6lgykK2WOUA2nUHp8gIkRjeTN8z8SABlkvcvR-9PIrboxIvPGujPgWebLQeHHgX7yLUoxFSduiZrTog6WoZLiAvqcTR1QTPVRmns2tYjACpp7EQ=w2400" height="100px">
    </a>
    <h1 align="center">Simple view bulma for web application yii3.</h1>
    <br>
</p>

[![Total Downloads](https://poser.pugx.org/yii-extension/simple-view-bulma/downloads.png)](https://packagist.org/packages/yii-extension/simple-view-bulma)
[![Build Status](https://github.com/yii-extension/simple-view-bulma/workflows/build/badge.svg)](https://github.com/yii-extension/simple-view-bulma/actions?query=workflow%3Abuild)
[![codecov](https://codecov.io/gh/yii-extension/simple-view-bulma/branch/master/graph/badge.svg?token=tUznVx9Em7)](https://codecov.io/gh/yii-extension/simple-view-bulma)
[![static analysis](https://github.com/yii-extension/simple-view-bulma/workflows/static%20analysis/badge.svg)](https://github.com/yii-extension/simple-view-bulma/actions?query=workflow%3A%22static+analysis%22)
[![type-coverage](https://shepherd.dev/github/yii-extension/simple-view-bulma/coverage.svg)](https://shepherd.dev/github/yii-extension/simple-view-bulma)

## Directory structure

      config/             application directory configurations
          web             contains web config local classes
          
      src/                application directory
          Action          contains action classes
          Asset           contains asset classes
          Handler         contains handlers classes
          ViewInjection   contains view injection classes

## Installation

```shell
composer create-project --prefer-dist --stability dev yii-extension/simple-app <your project>
composer require yii-extension/simple-view-bulma:@dev
```

## Translation extractor

The root directory of simple-app: `config/packages/yiisoft-translator-extractor/console.php`:

```php
<?php

declare(strict_types=1);

use Yiisoft\Aliases\Aliases;
use Yiisoft\Translator\Extractor\Extractor;

/** @var array $params */

return [
    Extractor::class => [
        '__construct()' => [
            'messageReader' => static fn (Aliases $aliases) => new \Yiisoft\Translator\Message\Php\MessageSource(
                $aliases->get('@resources/translation')
            ),
            'messageWriter' => static fn (Aliases $aliases) => new \Yiisoft\Translator\Message\Php\MessageSource(
                $aliases->get('@resources/translation')
            ),
        ],
    ],
];
```

The root directory of simple-app:

```shell
./yii translator/extract --languages=es --only=**/vendor/yii-extension/simple-view-bulma/storage/**
```

## Codeception testing

The package is tested with [Codeception](https://github.com/Codeception/Codeception). To run tests:

```shell
php -S 127.0.0.1:8080 -t public > yii.log 2>&1 &
vendor/bin/codecept run
```

## Static analysis

The code is statically analyzed with [Psalm](https://psalm.dev/docs). To run static analysis:

```shell
./vendor/bin/psalm
```

### License

The simple-app for Yii Packages is free software. It is released under the terms of the BSD License.
Please see [`LICENSE`](./LICENSE.md) for more information.

Maintained by [Yii Extension](https://github.com/yii-extension).
