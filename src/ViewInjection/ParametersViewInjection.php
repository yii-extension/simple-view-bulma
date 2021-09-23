<?php

declare(strict_types=1);

namespace Simple\View\Bulma\ViewInjection;

use Yiisoft\Assets\AssetManager;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Session\Flash\Flash;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\Yii\View\CommonParametersInjectionInterface;
use Yiisoft\Yii\View\LayoutParametersInjectionInterface;

final class ParametersViewInjection implements CommonParametersInjectionInterface, LayoutParametersInjectionInterface
{
    private AssetManager $assetManager;
    private CurrentRoute $currentRoute;
    private Flash $flash;
    private TranslatorInterface $translator;
    private UrlGeneratorInterface $urlGenerator;

    public function __construct(
        AssetManager $assetManager,
        CurrentRoute $currentRoute,
        Flash $flash,
        TranslatorInterface $translator,
        UrlGeneratorInterface $urlGenerator
    ) {
        $this->assetManager = $assetManager;
        $this->currentRoute = $currentRoute;
        $this->flash = $flash;
        $this->translator = $translator;
        $this->urlGenerator = $urlGenerator;
    }

    public function getCommonParameters(): array
    {
        return [
            'assetManager' => $this->assetManager,
            'currentRoute' => $this->currentRoute,
            'translator' => $this->translator,
            'urlGenerator' => $this->urlGenerator,
        ];
    }

    public function getLayoutParameters(): array
    {
        return ['flash' => $this->flash];
    }
}
