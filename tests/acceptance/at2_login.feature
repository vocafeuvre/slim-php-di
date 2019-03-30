Feature: login
  In order to use the app
  As a user
  I need to login to the app

  Scenario: try login
    Given I have a username with a value of "vocafeuvre" and a password with a value of "123"
    When I login
    Then I should see the response status code as "200"
    And I should see first name as "vocal"
    And I should see last name as "feuvre"
    And I should see bearer token as not empty