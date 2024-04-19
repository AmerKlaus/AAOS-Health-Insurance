Feature: Secure User Login

  In order to securely access the system
  As a user
  I want to log in with valid credentials

  Scenario: Successful login with valid credentials
    Given I am on the login page
    When I enter valid user credentials, including username and password
    And click the Login button
    Then I should be directed to the dashboard page
    And I should see a welcome message acknowledging my successful login
    And the dashboard should display relevant user information and options for further actions

  Scenario: Failed login with invalid credentials
    Given I am on the login page
    When I enter invalid user credentials, such as an incorrect username or password
    And click the Login button
    Then I should remain on the login page
    And I should see an error message indicating that my login attempt was unsuccessful due to invalid credentials
    And I should have the option to reset my password or contact support for assistance
