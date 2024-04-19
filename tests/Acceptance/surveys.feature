Feature: User Satisfaction Surveys

  In order to gather feedback and improve claims processing
  As an admin
  I need to conduct regular user satisfaction surveys

  Scenario: Conducting user satisfaction survey
    Given I am logged into the admin panel
    When I initiate a user satisfaction survey
    Then customers should receive the survey via email or on the website
    And the survey should include questions about their experience with the claims process, customer service, and overall satisfaction
    And customers should be able to provide feedback by selecting options or providing comments
    And I should receive the survey responses for analysis and improvement purposes
    And I should have the option to view survey analytics to identify trends and areas for improvement
