<?php

declare(strict_types=1);

use Simple\View\Bulma\Handler\NotFoundHandler;
use Simple\View\Bulma\ViewInjection\CommonViewInjection;
use Simple\View\Bulma\ViewInjection\LayoutViewInjection;
use Yiisoft\Definitions\Reference;
use Yiisoft\Yii\View\CsrfViewInjection;

return [
    'yiisoft/aliases' => [
        'aliases' => [
            '@simple-view-bulma' => '@vendor/yii-extension/simple-view-bulma',
            '@layout' => '@simple-view-bulma/views/layout',
        ]
    ],

    'yiisoft/yii/http' => [
        'notFoundHandler' => NotFoundHandler::class,
    ],

    'yiisoft/yii-view' => [
        'injections' => [
            Reference::to(CommonViewInjection::class),
            Reference::to(CsrfViewInjection::class),
            Reference::to(LayoutViewInjection::class),
        ],
    ],

    'yiisoft/translator' => [
        'categorySources' => [
            Reference::to('categorySourceSimpleViewBulma'),
        ],
    ],
];
