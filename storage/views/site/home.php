<?php

declare(strict_types=1);

use Yiisoft\Html\Html;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\View\WebView;

/**
 * @var TranslatorInterface $translator
 * @var $this WebView
 */

$title = $translator->translate('My Project', [], 'simple-view-bulma');

$this->setTitle(Html::encode($title));
?>

<h1 class="title"><?= $translator->translate('Hello!', [], 'simple-view-bulma') ?></h1>

<p class="subtitle">
    <?= $translator->translate(
        "Let's start something great with <strong>Yii3</strong>!",
        [],
        'simple-view-bulma'
    ) ?>
</p>

<p class="subtitle">
    <a class='has-text-link' href="https://github.com/yiisoft/docs/tree/master/guide/en" target="_blank" rel="noopener">
        <?= $translator->translate("Don't forget to check the guide.", [], 'simple-view-bulma') ?>
    </a>
</p>

