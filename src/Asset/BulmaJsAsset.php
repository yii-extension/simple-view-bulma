<?php

declare(strict_types=1);

namespace Simple\View\Bulma\Asset;

use Yiisoft\Assets\AssetBundle;
use Yiisoft\Files\PathMatcher\PathMatcher;

final class BulmaJsAsset extends AssetBundle
{
    public ?string $basePath = '@assets';
    public ?string $baseUrl = '@assetsUrl';
    public ?string $sourcePath = '@npm/vizuaalog--bulmajs/dist';

    /** @var array  */
    public array $js = [
        'file.js',
        'message.js',
        'navbar.js'
    ];

    public function __construct()
    {
        $pathMatcher = new PathMatcher();

        $this->publishOptions = [
            'filter' => $pathMatcher->only('**file.js', '**message.js', '**navbar.js'),
        ];
    }
}
