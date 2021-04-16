<?php

declare(strict_types=1);

use Psr\EventDispatcher\EventDispatcherInterface;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Factory\Definition\Reference;
use Yiisoft\Translator\CategorySource;
use Yiisoft\Translator\Formatter\Intl\IntlMessageFormatter;
use Yiisoft\Translator\MessageFormatterInterface;
use Yiisoft\Translator\MessageReaderInterface;
use Yiisoft\Translator\Message\Php\MessageSource;
use Yiisoft\Translator\Translator;
use Yiisoft\Translator\TranslatorInterface;

/** @var array $params */

return [
    // Config TranslatorInterface::class
    MessageReaderInterface::class => [
        'class' => MessageSource::class,
        '__construct()' =>  [static fn (Aliases $aliases) => $aliases->get('@simple-view-bulma/storage/translation')]
    ],

    MessageFormatterInterface::class => IntlMessageFormatter::class,

    TranslatorInterface::class => [
        'class' => Translator:: class,
        '__construct()' => [
            $params['yii-extension/user-view-bulma']['locale'],
            $params['yii-extension/user-view-bulma']['fallbackLocale'],
            Reference::to(EventDispatcherInterface::class),
        ],
        'addCategorySource()' => [
            static fn(MessageReaderInterface $messageReader, MessageFormatterInterface $messageFormatter) =>
                new CategorySource('simple-view-bulma', $messageReader, $messageFormatter),
        ],
    ],
];
