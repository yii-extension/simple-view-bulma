<?php

declare(strict_types=1);

namespace Simple\View\Bulma\Tests\Acceptance;

use Simple\View\Bulma\Tests\AcceptanceTester;

final class PageHomeCest
{
    public function testHomePage(AcceptanceTester $I): void
    {
        $I->amOnPage('/');
        $I->wantTo('see page index.');
        $I->see('Hello World');
    }
}
