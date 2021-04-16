<?php

declare(strict_types=1);

use Simple\View\Bulma\Asset\ViewBulmaAsset;
use Yii\Extension\Widget\FlashMessage;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Csrf\CsrfTokenInterface;
use Yiisoft\Router\UrlMatcherInterface;
use Yiisoft\Translator\TranslatorInterface;

/**
 * @var AssetManager $assetManager
 * @var string $content
 * @var CsrfTokenInterface $csrf
 * @var TranslatorInterface $translator
 * @var UrlMatcherInterface $urlMatcher
 */

$assetManager->register([ViewBulmaAsset::class]);
$this->setCssFiles($assetManager->getCssFiles());
$this->setJsFiles($assetManager->getJsFiles());
?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="en-US">
        <?= $this->render('_head', ['translator' => $translator, 'csrf' => $csrf]) ?>
        <?php $this->beginBody() ?>
            <body>
                <section class="hero is-fullheight is-light">
                    <div class="hero-head">
                        <header class = <?= (isset($identity) && $identity->getId() !== null)
                            ? "navbar" : "has-background-black" ?>>
                            <?= $this->render(
                                '_menu',
                                ['translator' => $translator, 'urlMatcher' => $urlMatcher]
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
