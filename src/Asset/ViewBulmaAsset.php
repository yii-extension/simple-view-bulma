<?php

declare(strict_types=1);

namespace Simple\View\Bulma\Asset;

use Yii\Extension\Fontawesome\Dev\Js\NpmAllAsset;
use Yiisoft\Assets\AssetBundle;
use Yiisoft\Yii\Bulma\Asset\BulmaAsset;
use Yiisoft\Yii\Bulma\Asset\BulmaHelpersAsset;

final class ViewBulmaAsset extends AssetBundle
{
    public ?string $basePath = '@assets';
    public ?string $baseUrl = '@assetsUrl';
    public ?string $sourcePath = '@simple-view-bulma/storage/asset/css';

    /** @var array */
    public array $css = [
        'site.css'
    ];

    /** @var array */
    public array $depends = [
        BulmaAsset::class,
        BulmaHelpersAsset::class,
        BulmaJsAsset::class,
        NpmAllAsset::class,
    ];
}
