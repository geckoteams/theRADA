<?php
declare(strict_types=1);

use Codeception\Util\Locator;

class EventCest
{

    /**
     * @var \Faker\Generator
     */
    private $faker;

    /**
     * @var mixed
     */
    private $toggleEventsButton;


    public function __construct()
    {
        $this->faker = \Faker\Factory::create();
        $this->toggleEventsButton = Locator::lastElement('//*[@id="tab-1"]//a[contains(concat(" ", @class, " "), " myOpenProject ")]');
    }

    function _before(AcceptanceTester $I)
    {
        $this->faker->seed(3363);

        $loginPage = new \Page\Login($I);
        $loginPage->autoLogin();
    }

    public function createEvent(AcceptanceTester $I)
    {
    }

}