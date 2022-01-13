<?php

declare(strict_types=1);

namespace Simple\View\Bulma\ViewInjection;

use Yiisoft\Session\Flash\Flash;
use Yiisoft\Yii\View\LayoutParametersInjectionInterface;

final class LayoutViewInjection implements LayoutParametersInjectionInterface
{
    public function __construct(private Flash $flash)
    {
    }

    public function getLayoutParameters(): array
    {
        return ['flash' => $this->flash];
    }
}
