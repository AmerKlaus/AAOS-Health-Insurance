Feature: Profile Information Update

In order to keep my profile information up to date
As a user
I need to update my contact details or address if needed

Scenario: Updating profile information
Given I am logged into the system as a user
When I navigate to the profile settings
And update my contact details or address
Then my profile information should be successfully updated
