<?php

declare(strict_types=1);

use Simple\View\Bulma\ViewInjection\ParametersViewInjection;
use Yiisoft\Factory\Definition\Reference;
use Yiisoft\Yii\View\CsrfViewInjection;

return [
    'yiisoft/aliases' => [
        'aliases' => [
            '@simple-view-bulma' => '@vendor/yii-extension/simple-view-bulma',
            '@storage' => '@simple-view-bulma/storage',
            '@layout' => '@simple-view-bulma/storage/layout',
        ]
    ],

    'yiisoft/yii-view' => [
        'injections' => [
            Reference::to(CsrfViewInjection::class),
            Reference::to(ParametersViewInjection::class),
        ],
    ],

    'yiisoft/translator' => [
        'categorySources' => [
            Reference::to('categorySourceSimpleViewBulma'),
        ],
    ],
];
