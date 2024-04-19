Feature: Virtual Assistant/FAQ Bot

  In order to quickly obtain answers to common queries
  As a user
  I want to interact with a virtual assistant/FAQ bot on the website

  Scenario: Providing instant answers
    Given I am on the website's homepage
    When I click on the virtual assistant/FAQ bot icon located at the bottom right corner of the screen
    And the virtual assistant/FAQ bot interface is activated
    And I enter a valid text query such as "How do I reset my password?"
    Then it should instantly respond with relevant answers displayed in a pop-up window or chat interface

  Scenario: Handling vague queries
    Given I am on the website's support page
    When I click on the virtual assistant/FAQ bot icon located at the top of the support page
    And the virtual assistant/FAQ bot interface is activated
    And I enter a vague text query such as "payment issues"
    Then it should prompt for clarification or suggest related topics based on the vague query
    And upon receiving clarification or selecting a suggested topic, it should provide relevant answers or further assistance

