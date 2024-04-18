Feature: Secure User Login

In order to securely access the system
As a user
I want to log in with a valid username and password

Scenario: Successful login with valid credentials
Given I am on the login page
When I enter a valid username and password
And click Login
Then I should be directed to the dashboard

Scenario: Failed login with invalid credentials
Given I am on the login page
When I enter an invalid username and password
And click Login
Then I should see an error message indicating invalid credentials

