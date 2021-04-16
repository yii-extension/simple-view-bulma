<?php

declare(strict_types=1);

use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\View\WebView;

/**
 * @var TranslatorInterface $translator
 * @var $this WebView
 */

$this->params['breadcrumbs'] = '/';
$this->setTitle('My App');
?>

<h1 class="title"><?= $translator->translate('Hello World', [], 'simple-view-bulma') ?></h1>
<p class="subtitle">
    <?= $translator->translate('My first website with', [], 'simple-view-bulma') ?>
    <strong>Yii 3.0!</strong>
</p>
