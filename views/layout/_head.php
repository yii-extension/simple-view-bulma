<?php

declare(strict_types=1);

use Yiisoft\Html\Html;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\View\WebView;

/**
 * @var string $csrf
 * @var TranslatorInterface $translator
 * @var Webview $this
 */
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf" content="<?= $csrf ?>">
    <title><?= Html::encode($translator->translate($this->getTitle(), [], 'simple-view-bulma')) ?></title>
    <?php $this->head() ?>
</head>
