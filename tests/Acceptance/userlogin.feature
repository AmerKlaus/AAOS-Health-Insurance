Feature: Secure User Login

  In order to securely access the system
  As a user
  I want to log in with valid credentials

  Scenario: Successful login with valid credentials
    Given I am on the login page
    When I enter valid user credentials
    And click Login
    Then I should be directed to the dashboard

  Scenario: Failed login with invalid credentials
    Given I am on the login page
    When I enter invalid user credentials
    And click Login
    Then I should see an error message indicating invalid credentials
