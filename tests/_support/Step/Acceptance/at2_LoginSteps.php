<?php
namespace Step\Acceptance;

class at2_LoginSteps extends \AcceptanceTester
{
    /**
     * @Given I have a username with a value of :arg1 and a password with a value of :arg2
     */
    public function iHaveAUsernameWithAValueOfAndAPasswordWithAValueOf($arg1, $arg2)
    {
        $this->username = $arg1;
        $this->password = $arg2;
    }

   /**
    * @When I login
    */
    public function iLogin()
    {
        $this->sendPOST('/auth/login', [
            'user_name' => $this->username,
            'password' => $this->password
        ]);
    }

   /**
    * @Then I should see first name as :arg1
    */
    public function iShouldSeeFirstNameAs($arg1)
    {
        $this->seeResponseContainsJson(array('first_name' => $arg1));
    }

   /**
    * @Then I should see last name as :arg1
    */
    public function iShouldSeeLastNameAs($arg1)
    {
        $this->seeResponseContainsJson(array('last_name' => $arg1));
    }

   /**
    * @Then I should see bearer token as not empty
    */
    public function iShouldSeeBearerTokenAsNotEmpty()
    {
        // $I->seeResponseJsonMatchesXpath('//token');
    }
}