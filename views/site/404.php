<?php

use Yiisoft\Html\Html;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\View\WebView;

/**
 * @var CurrentRoute $currentRoute
 * @var TranslatorInterface $translator
 * @var UrlGeneratorInterface $urlGenerator
 * @var $this WebView
 */

$this->setTitle('404');
?>

<h1 class="is-size-1">
    <b><?= Html::encode($this->getTitle()) ?></b>
</h1>

<p class="has-text-danger">
    <?= $translator->translate('The page', [], 'simple-view-bulma') ?>
    <strong><?= Html::encode($currentRoute->getUri()->getPath()) ?></strong>
    <?= $translator->translate('not found', [], 'simple-view-bulma') ?>.
</p>

<p class="has-text-grey">
    <?= $translator->translate(
        'The above error occurred while the Web server was processing your request',
        [],
        'simple-view-bulma',
    ) ?>.
    <br/>
    <?= $translator->translate(
        'Please contact us if you think this is a server error. Thank you',
        [],
        'simple-view-bulma',
    ) ?>.
</p>

<hr class="mb-2">

<a class ="button is-danger mt-5" href="<?= $urlGenerator->generate('home') ?>">
    <?= $translator->translate('Go Back Home', [], 'simple-view-bulma') ?>
</a>
