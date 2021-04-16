<?php

declare(strict_types=1);

use Yiisoft\Router\UrlMatcherInterface;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\Yii\Bulma\Nav;
use Yiisoft\Yii\Bulma\NavBar;

/**
 * @var array $menuItems
 * @var TranslatorInterface $translator
 * @var UrlMatcherInterface $urlMatcher
 */

$config = [
    'brandLabel()' => [$translator->translate('My Project', [], 'simple-view-bulma')],
    'brandImage()' => ['/images/yii-logo.jpg'],
    'itemsOptions()' => [['class' => 'navbar-end']],
    'options()' => [['class' => 'is-black']],
];
$menuItems =  [];
$currentUri = $urlMatcher->getCurrentUri();
$currentUrl = '';

if ($currentUri !== null) {
    $currentUrl = $currentUri->getPath();
}
?>

<?= NavBar::widget($config)->begin() ?>
    <?= Nav::widget()->currentPath($currentUrl)->items($menuItems) ?>
<?= NavBar::end();
