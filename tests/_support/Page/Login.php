<?php

namespace Page;

class Login
{
    public static $URL = '/';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */
    public static $EMAIL = 'salman9607@gmail.com';

    public static $PASSWORD = 'Sakpase@21';


    /**
     * @var \AcceptanceTester
     */
    protected $tester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->tester = $I;
    }


    public static function route($param): string
    {
        return static::$URL . $param;
    }

    public function autoLogin()
    {
        $I = $this->tester;

        $I->amOnPage(static::$URL);
        $I->click('//a[@data-target="#myModal"]');
        $I->wait(2);
        $I->fillField('email', static::$EMAIL);
        $I->fillField('password', static::$PASSWORD);
        $I->click('Sign in');
        $I->wait(1);
    }


}
