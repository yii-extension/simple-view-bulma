<?php

declare(strict_types=1);

use Simple\View\Bulma\Asset\ViewBulmaAsset;
use Yii\Extension\Widget\FlashMessage;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Csrf\CsrfTokenInterface;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Router\UrlMatcherInterface;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\View\WebView;

/**
 * @var AssetManager $assetManager
 * @var string $content
 * @var CsrfTokenInterface $csrf
 * @var TranslatorInterface $translator
 * @var UrlGeneratorInterface $urlGenerator
 * @var UrlMatcherInterface $urlMatcher
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
                                    'translator' => $translator,
                                    'urlGenerator' => $urlGenerator,
                                    'urlMatcher' => $urlMatcher,
                                    'user' => $user ?? [],
                                ],
                            ) ?>
                        </header>
                        <div>
                            <?= FlashMessage::widget() ?>
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
