Feature: Request Additional Information
  In order to complete claim processing
  As an admin
  I need to request additional information from customers

  Scenario: Requesting additional information
    Given I identify missing or unclear information in submitted claim documents
    When I request additional information from the customer
    Then the customer should be notified to provide the necessary documentation
