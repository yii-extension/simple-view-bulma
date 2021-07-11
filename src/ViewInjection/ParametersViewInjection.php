<?php

declare(strict_types=1);

namespace Simple\View\Bulma\ViewInjection;

use Yiisoft\Assets\AssetManager;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Router\UrlMatcherInterface;
use Yiisoft\Session\Flash\Flash;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\Yii\View\ContentParametersInjectionInterface;
use Yiisoft\Yii\View\LayoutParametersInjectionInterface;

final class ParametersViewInjection implements ContentParametersInjectionInterface, LayoutParametersInjectionInterface
{
    private AssetManager $assetManager;
    private Flash $flash;
    private TranslatorInterface $translator;
    private UrlGeneratorInterface $urlGenerator;
    private UrlMatcherInterface $urlMatcher;

    public function __construct(
        AssetManager $assetManager,
        Flash $flash,
        TranslatorInterface $translator,
        UrlGeneratorInterface $urlGenerator,
        UrlMatcherInterface $urlMatcher
    ) {
        $this->assetManager = $assetManager;
        $this->flash = $flash;
        $this->translator = $translator;
        $this->urlGenerator = $urlGenerator;
        $this->urlMatcher = $urlMatcher;
    }

    public function getContentParameters(): array
    {
        return [
            'assetManager' => $this->assetManager,
            'translator' => $this->translator,
            'urlGenerator' => $this->urlGenerator,
            'urlMatcher' => $this->urlMatcher,
        ];
    }

    public function getLayoutParameters(): array
    {
        return [
            'assetManager' => $this->assetManager,
            'flash' => $this->flash,
            'translator' => $this->translator,
            'urlGenerator' => $this->urlGenerator,
            'urlMatcher' => $this->urlMatcher,
        ];
    }
}
