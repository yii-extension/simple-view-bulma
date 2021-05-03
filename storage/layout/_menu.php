<?php

declare(strict_types=1);

use Yiisoft\Csrf\CsrfTokenInterface;
use Yiisoft\Form\Widget\Form;
use Yiisoft\Html\Html;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Router\UrlMatcherInterface;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\Yii\Bulma\Nav;
use Yiisoft\Yii\Bulma\NavBar;

/**
 * @var CsrfTokenInterface $csrf
 * @var array $menuItems
 * @var TranslatorInterface $translator
 * @var UrlGeneratorInterface $urlGenerator
 * @var UrlMatcherInterface $urlMatcher
 */

$config = [
    'brandLabel()' => [$translator->translate('My Project', [], 'simple-view-bulma')],
    'brandImage()' => ['/images/yii-logo.jpg'],
    'itemsOptions()' => [['class' => 'navbar-end']],
    'options()' => [['class' => 'is-black']],
];
$menuItems = [];

if ($user !== [] && !$user->isGuest()) {
    $menuItems =  [
        [
            'label' => Form::widget()
                ->action($urlGenerator->generate('logout'))
                ->options(['csrf' => $csrf, 'encode' => false])
                ->begin() .
                    Html::submitButton(
                        'Logout (' . Html::encode($user->getIdentity()->getUsername()) . ')',
                        [
                            'id' => 'logout',
                            'encode' => false,
                        ],
                    ) .
                Form::end(),
            'encode' => false,
            'linkOptions' => ['encode' => false],
            'options' => ['encode' => false],
        ]
    ];
}

$currentUri = $urlMatcher->getCurrentUri();
$currentUrl = '';

if ($currentUri !== null) {
    $currentUrl = $currentUri->getPath();
}
?>

<?= NavBar::widget($config)->begin() ?>
    <?= Nav::widget()->currentPath($currentUrl)->items($menuItems) ?>
<?= NavBar::end();
