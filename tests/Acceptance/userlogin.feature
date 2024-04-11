Feature: Secure User Login

In order to access the system securely
As a user
I need to log in with valid credentials

Scenario: Successful login with valid credentials
Given I am on the login page
When I enter valid user username and password
And click "Login"
Then I should be logged in and directed to the dashboard

Scenario: Failed login with invalid credentials
Given I am on the login page
When I enter invalid user username and password
And click Login
Then I should see an error message indicating invalid credentials
