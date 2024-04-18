Feature: User Satisfaction Surveys

  In order to gather feedback and improve claims processing
  As an admin
  I need to conduct regular user satisfaction surveys

  Scenario: Conducting user satisfaction survey
    Given I am logged into the admin panel
    When I initiate a user satisfaction survey
    Then customers should receive the survey and provide feedback
