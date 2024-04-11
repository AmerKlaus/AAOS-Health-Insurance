Feature: Viewing Claim History

In order to track my past claims
As a user
I need to view the history of my claims and their statuses

Scenario: Viewing claim history
Given I am logged into the system as a user
When I navigate to the claim history section
Then I should see a list of my past claims with their statuses
