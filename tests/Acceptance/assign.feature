Feature: Assign Claims
  In order to ensure efficient handling and resolution
  As an admin
  I need to assign claims to specific processors or teams

  Scenario: Assigning claims to processors or teams
    Given I review a claim
    When I assign the claim to a specific processor or team
    Then the claim should be routed to the designated entity for processing
