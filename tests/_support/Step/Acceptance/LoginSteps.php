<?php
namespace Step\Acceptance;

class LoginSteps extends \AcceptanceTester
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
            'username' => $this->username,
            'password' => $this->password
        ]);
    }

   /**
    * @Then I should see first name as :arg1
    */
    public function iShouldSeeFirstNameAs($arg1)
    {
        $this->seeResponseContainsJson(['first_name' => $arg1]);
    }

   /**
    * @Then I should see last name as :arg1
    */
    public function iShouldSeeLastNameAs($arg1)
    {
        $this->seeResponseContainsJson(['last_name' => $arg1]);
    }

   /**
    * @Then I should see bearer token as not empty
    */
    public function iShouldSeeBearerTokenAsNotEmpty()
    {
        
        $this->seeResponseContainsJson(['token']);
    }
}