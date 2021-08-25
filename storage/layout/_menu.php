<?php

declare(strict_types=1);

use Yii\Extension\Bulma\Nav;
use Yii\Extension\Bulma\NavBar;
use Yii\Extension\Simple\Forms\Form;
use Yiisoft\Csrf\CsrfTokenInterface;
use Yiisoft\Html\Tag\Button;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\Translator\TranslatorInterface;

/**
 * @var CsrfTokenInterface $csrf
 * @var array $menuItems
 * @var TranslatorInterface $translator
 * @var UrlGeneratorInterface $urlGenerator
 * @var CurrentRoute $currentRoute
 */

$menuItems = [];

if ($currentUser !== [] && !$currentUser->isGuest()) {
    $menuItems =  [
        [
            'label' => Form::widget()
                ->action($urlGenerator->generate('logout'))
                ->csrf($csrf)
                ->begin() .
                    Button::tag()
                    ->class('button is-small is-white')
                    ->content(
                        'Logout (' . $currentUser->getIdentity()->getUsername() . ')'
                    )
                    ->id('logout')
                    ->type('submit') .
                Form::end(),
        ]
    ];
}

$currentUri = $currentRoute->getUri();
$currentUrl = '';

if ($currentUri !== null) {
    $currentUrl = $currentUri->getPath();
}
?>

<?= NavBar::widget()
        ->attributes(['class' => 'is-black'])
        ->brandImage('/images/yii-logo.jpg')
        ->brandText($translator->translate('My Project', [], 'simple-view-bulma'))
        ->begin() ?>
    <?= Nav::widget()->currentPath($currentUrl)->enclosedByEndMenu()->items($menuItems) ?>
<?= NavBar::end();
