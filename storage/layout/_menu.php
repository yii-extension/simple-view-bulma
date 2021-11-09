<?php

declare(strict_types=1);

use Yii\Extension\Bulma\Nav;
use Yii\Extension\Bulma\NavBar;
use Yiisoft\Csrf\CsrfTokenInterface;
use Yiisoft\Form\Widget\Form;
use Yiisoft\Html\Tag\Button;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Translator\TranslatorInterface;

/**
 * @var CsrfTokenInterface $csrf
 * @var CurrentRoute $currentRoute
 * @var bool|null $isGuest
 * @var array $menuItems
 * @var TranslatorInterface $translator
 * @var UrlGeneratorInterface $urlGenerator
 * @var string $userName
 */

$isGuest = $isGuest ?? null;
$menuItems = [];

if ($isGuest === false) {
    $menuItems =  [
        [
            'label' => Form::widget()
                ->action($urlGenerator->generate('logout'))
                ->csrf($csrf)
                ->begin() .
                    Button::tag()
                    ->class('button is-small is-white')
                    ->content(
                        'Logout (' . $userName . ')'
                    )
                    ->id('logout')
                    ->type('submit') .
                Form::end(),
        ]
    ];
}

$currentUrl = $currentRoute->getUri() !== null ? $currentRoute->getUri()->getPath() : '';
?>

<?= NavBar::widget()
        ->attributes(['class' => 'is-black'])
        ->brandImage('/images/yii-logo.jpg')
        ->brandText($translator->translate('My Project', [], 'simple-view-bulma'))
        ->begin() ?>
    <?= Nav::widget()->currentPath($currentUrl)->enclosedByEndMenu()->items($menuItems) ?>
<?= NavBar::end();
