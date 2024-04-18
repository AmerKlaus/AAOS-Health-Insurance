Feature: Review Claim Documents

  In order to ensure completeness and accuracy of claim documents
  As an admin
  I need to review submitted claim documents

  Scenario: Reviewing claim documents
    Given I am logged into the system as an admin
    When I navigate to the claims review section
    Then I should be able to view submitted claim documents

  Scenario: Providing feedback on claim documents
    Given I am reviewing claim documents
    When I identify missing or inaccurate information
    And request additional information from the customer
    Then the customer should be notified to provide the necessary documentation
