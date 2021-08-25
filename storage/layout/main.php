<?php

declare(strict_types=1);

use Simple\View\Bulma\Asset\ViewBulmaAsset;
use Yii\Extension\Bulma\AlertFlash;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Csrf\CsrfTokenInterface;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Session\Flash\Flash;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\View\WebView;

/**
 * @var AssetManager $assetManager
 * @var string $content
 * @var CsrfTokenInterface $csrf
 * @var Flash $flash
 * @var TranslatorInterface $translator
 * @var UrlGeneratorInterface $urlGenerator
 * @var CurrentRoute $currentRoute
 * @var Webview $this
 */

$assetManager->register([ViewBulmaAsset::class]);
$this->addCssFiles($assetManager->getCssFiles());
$this->addJsFiles($assetManager->getJsFiles());
?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="en-US">
        <?= $this->render('_head', ['translator' => $translator, 'csrf' => $csrf]) ?>
        <?php $this->beginBody() ?>
            <body>
                <section class="hero is-fullheight is-light">
                    <div class="hero-head">
                        <header class = "has-background-black">
                            <?= $this->render(
                                '_menu',
                                [
                                    'csrf' => $csrf,
                                    'currentRoute' => $currentRoute,
                                    'translator' => $translator,
                                    'urlGenerator' => $urlGenerator,
                                    'currentUser' => $currentUser ?? [],
                                ],
                            ) ?>
                        </header>
                        <div>
                            <?= AlertFlash::widget([$flash])
                                ->class('is-flex is-align-items-center')
                                ->iconAttributes(['class' => 'fa-2x is-flex-shrink-0 mr-4'])
                                ->layoutBody('{icon}{body}{button}')
                                ->render() ?>
                        </div>
                    </div>
                    <div class="hero-body is-light">
                        <div class="container has-text-centered">
                            <?= $content ?>
                        </div>
                    </div>
                    <div class="hero-footer has-background-black">
                        <?= $this->render('_footer') ?>
                    </div>
                </section>
            </body>
        <?php $this->endBody() ?>
    </html>
<?php $this->endPage();
