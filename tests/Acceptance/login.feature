Feature: Admin Login

  In order to access the system securely
  As an admin
  I need to log in with valid credentials

  Scenario: Successful login with valid credentials
    Given I am on the login page
    When I enter valid admin username or password
    And I click "Login"
    Then I should be logged in and directed to the dashboard

  Scenario: Failed login with invalid credentials
    Given I am on the login page
    When I enter invalid admin username or password
    And click "Login"
    Then I should see an error message indicating invalid credentials
