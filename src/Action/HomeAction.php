<?php

declare(strict_types=1);

namespace Simple\View\Bulma\Action;

use Psr\Http\Message\ResponseInterface;
use Yiisoft\Yii\View\ViewRenderer;

final class HomeAction
{
    public function run(ViewRenderer $viewRenderer): ResponseInterface
    {
        return $viewRenderer->withViewPath('@simple-view-bulma/storage/views')->render('site/home');
    }
}
