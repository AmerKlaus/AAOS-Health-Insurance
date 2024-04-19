Feature: Accessing Help Documentation

  In order to understand how to use the system effectively
  As a user
  I need access to help documentation and tutorials

  Scenario: Accessing help documentation
    Given I am logged in as a user
    When I navigate to the help section
    Then I should be able to access FAQs, user guides, and tutorials
    And I should see a comprehensive list of frequently asked questions (FAQs) covering common queries and issues
    And I should be able to access user guides providing detailed instructions on system functionality and features
    And I should find tutorials or walkthroughs demonstrating how to perform specific tasks or use advanced features
    And the help documentation should be organized and easily navigable for efficient access
