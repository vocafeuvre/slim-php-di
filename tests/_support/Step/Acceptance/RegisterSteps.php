<?php

namespace Step\Acceptance;

use Codeception\Util\Fixtures;

class RegisterSteps extends \AcceptanceTester
{
    /**
     * @Given I have a username with value of :arg1
     */
    public function iHaveAUsernameWithValueOf($arg1)
    {
        Fixtures::add('username', $arg1);
    }

   /**
    * @Given I have a first name with value of :arg1
    */
    public function iHaveAFirstNameWithValueOf($arg1)
    {
        Fixtures::add('first_name', $arg1);
    }

   /**
    * @Given I have a last name with value of :arg1
    */
    public function iHaveALastNameWithValueOf($arg1)
    {
        Fixtures::add('last_name', $arg1);
    }

   /**
    * @Given I have a password with value of :arg1
    */
    public function iHaveAPasswordWithValueOf($arg1)
    {
        Fixtures::add('password', $arg1);
    }

   /**
    * @When I register
    */
    public function iRegister()
    {
        $this->sendPOST('/auth/register', [
            'username' => Fixtures::get('username'),
            'first_name' => Fixtures::get('first_name'),
            'last_name' => Fixtures::get('last_name'),
            'password' => Fixtures::get('password')
        ]);
    }

   /**
    * @Then I should see the response status code as :arg1
    */
    public function iShouldSeeTheResponseStatusCodeAs($arg1)
    {
        $this->seeResponseCodeIs($arg1);
    }

   /**
    * @Then I should see the response message as :arg1
    */
    public function iShouldSeeTheResponseMessageAs($arg1)
    {
        $this->seeResponseContains('{"result": "'.$arg1.'"');
    }
}