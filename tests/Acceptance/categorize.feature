Feature: Categorize Claims
  In order to streamline processing workflow
  As an admin
  I need to categorize claims based on urgency and priority

  Scenario: Categorizing claims
    Given I review a claim
    When I categorize the claim based on urgency and priority
    Then the claim should be prioritized accordingly for processing
