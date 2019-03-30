Feature: register
  In order to access the app
  As a user
  I need to register an account with the app

  Scenario: try register
    Given I have a username with value of "vocafeuvre"
    And I have a first name with value of "vocal"
    And I have a last name with value of "feuvre"
    And I have a password with value of "123"
    When I register
    Then I should see the response status code as "200"
    And I should see the response containing all previous values