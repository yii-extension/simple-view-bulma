<?php

declare(strict_types=1);

use Yii\Extension\Bulma\Nav;
use Yii\Extension\Bulma\NavBar;
use Yiisoft\Auth\IdentityInterface;
use Yiisoft\Csrf\CsrfTokenInterface;
use Yiisoft\Form\Widget\Form;
use Yiisoft\Html\Tag\Button;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\View\WebView;

/**
 * @var CsrfTokenInterface $csrf
 * @var CurrentRoute $currentRoute
 * @var IdentityInterface $identity
 * @var array $menuItems
 * @var TranslatorInterface $translator
 * @var UrlGeneratorInterface $urlGenerator
 * @var string $userName
 * @var WebView $this
 */
$menuItems = $this->getParameter('menuItemsIsGuest', []);

if (isset($identity) && $identity instanceof IdentityInterface) {
    $menuItems = $this->getParameter('menuItemsIsNotGuest', []);
    $menuItems =  [
        [
            'label' => Form::widget()
                ->action($urlGenerator->generate('logout'))
                ->csrf($csrf)
                ->begin() .
                    Button::tag()
                    ->class('button is-small is-white')
                    ->content(
                        'Logout (' . $identity->user->username . ')'
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
