<?php

namespace Step\Acceptance;

use Codeception\Util\Fixtures;

class at1_RegisterSteps extends \AcceptanceTester
{
    /**
     * @Given I have a username with value of :arg1
     */
    public function iHaveAUsernameWithValueOf($arg1)
    {
        $this->user_name = $arg1;
    }

   /**
    * @Given I have a first name with value of :arg1
    */
    public function iHaveAFirstNameWithValueOf($arg1)
    {
        $this->first_name = $arg1;
    }

   /**
    * @Given I have a last name with value of :arg1
    */
    public function iHaveALastNameWithValueOf($arg1)
    {
        $this->last_name = $arg1;
    }

   /**
    * @Given I have a password with value of :arg1
    */
    public function iHaveAPasswordWithValueOf($arg1)
    {
        $this->password = $arg1;
    }

   /**
    * @When I register
    */
    public function iRegister()
    {
        $this->sendPOST('/auth/register', [
            'user_name' => $this->user_name,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'password' => $this->password
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
    * @Then I should see the response containing all previous values
    */
    public function iShouldSeeTheResponseContainingAllPreviousValues()
    {
        $this->seeResponseContainsJson(array('user_name' => $this->user_name));
        $this->seeResponseContainsJson(array('first_name' => $this->first_name));
        $this->seeResponseContainsJson(array('last_name' => $this->last_name));
    }
}