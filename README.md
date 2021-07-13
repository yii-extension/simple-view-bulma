<p align="center">
    <a href="https://github.com/yii-extension" target="_blank">
        <img src="https://lh3.googleusercontent.com/ehSTPnXqrkk0M3U-UPCjC0fty9K6lgykK2WOUA2nUHp8gIkRjeTN8z8SABlkvcvR-9PIrboxIvPGujPgWebLQeHHgX7yLUoxFSduiZrTog6WoZLiAvqcTR1QTPVRmns2tYjACpp7EQ=w2400" height="100px">
    </a>
    <h1 align="center">Simple view bulma web application for yii.</h1>
    <br>
</p>

[![Total Downloads](https://poser.pugx.org/yii-extension/simple-view-bulma/downloads.png)](https://packagist.org/packages/yii-extension/simple-view-bulma)
[![Build Status](https://github.com/yii-extension/simple-view-bulma/workflows/build/badge.svg)](https://github.com/yii-extension/simple-view-bulma/actions?query=workflow%3Abuild)
[![codecov](https://codecov.io/gh/yii-extension/simple-view-bulma/branch/master/graph/badge.svg?token=tUznVx9Em7)](https://codecov.io/gh/yii-extension/simple-view-bulma)
[![static analysis](https://github.com/yii-extension/simple-view-bulma/workflows/static%20analysis/badge.svg)](https://github.com/yii-extension/simple-view-bulma/actions?query=workflow%3A%22static+analysis%22)
[![type-coverage](https://shepherd.dev/github/yii-extension/simple-view-bulma/coverage.svg)](https://shepherd.dev/github/yii-extension/simple-view-bulma)

## Directory structure

      config/             application directory configurations
          common          contains common config local classes
          
      src/                application directory
          Action          contains action classes
          Asset           contains asset classes
          Handler         contains handlers classes
          ViewInjection   contains view injection classes

## Installation

```shell
composer create-project --prefer-dist --stability dev yii-extension/simple-app <your project>
cd <your project>
composer require yii-extension/simple-view-bulma:@dev
```

## Using custom error page

To configure the custom error page, you must modify the settings in the main application in the directory `config/web/yiisoft-web.php`.

```php
<?php

declare(strict_types=1);

use Simple\View\Bulma\Handler\NotFoundHandler;
use Yiisoft\ErrorHandler\Middleware\ErrorCatcher;
use Yiisoft\Factory\Definition\Reference;
use Yiisoft\Middleware\Dispatcher\MiddlewareDispatcher;
use Yiisoft\Router\Middleware\Router;
use Yiisoft\Session\SessionMiddleware;
use Yiisoft\Yii\Web\Application;

return [
    Application::class => [
        'class' => Application::class,
        '__construct()' => [
            'dispatcher' => static fn(MiddlewareDispatcher $middlewareDispatcher) =>
                $middlewareDispatcher->withMiddlewares(
                    [
                        Router::class,
                        SessionMiddleware::class,
                        ErrorCatcher::class,
                    ]
                ),
            'fallbackHandler' => Reference::to(NotFoundHandler::class),
        ],
    ],
];
```

## Using translations

By default the package includes the translation into spanish and russian.

The translation is in the `/storage/translations` directory. 

## Translation extractor

```shell
composer require yiisoft/translator-extractor --prefer-dist
```

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
                $aliases->get('@simple-view-bulma/translations')
            ),
            'messageWriter' => static fn (Aliases $aliases) => new \Yiisoft\Translator\Message\Php\MessageSource(
                $aliases->get('@simple-view-bulma/translations')
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

### Support the project

[![Open Collective](https://img.shields.io/badge/Open%20Collective-sponsor-7eadf1?logo=open%20collective&logoColor=7eadf1&labelColor=555555)](https://opencollective.com/yiisoft)

### License

The `yii-extension/simple-view-bulma` for Yii Packages is free software. It is released under the terms of the BSD License.
Please see [`LICENSE`](./LICENSE.md) for more information.

Maintained by [Yii Extension](https://github.com/yii-extension).
