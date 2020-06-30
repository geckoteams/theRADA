<?php
declare(strict_types=1);

use Page\Login as LoginPage;

class SigninCest
{

    /**
     * @var \Faker\Generator
     */
    private $faker;

    public function _before(AcceptanceTester $I)
    {
        $this->faker = \Faker\Factory::create();
    }

}