Feature: Contacting Customer Support

  In order to get assistance with my claim
  As a user
  I need to contact customer support through ticket support

  Scenario: Contacting customer support
    Given I am logged in as a user
    When I navigate to the support section
    And submit a support ticket for my claim
    Then customer support should respond to my query
