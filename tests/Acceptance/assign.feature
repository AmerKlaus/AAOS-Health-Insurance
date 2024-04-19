Feature: Assign Claims

In order to ensure efficient handling and resolution
As an admin
I need to assign claims to specific processors or teams

Scenario: Assigning a claim to a processor
  Given I am logged into the system as an admin
  And there is a claim awaiting review
  When I review the claim details
  And I assign the claim to a specific processor
  Then the claim should be routed to the designated processor for processing

Scenario: Assigning a claim to a team
  Given I am logged into the system as an admin
  And there is a claim awaiting review
  When I review the claim details
  And I assign the claim to a specific team
  Then the claim should be routed to the designated team for processing
