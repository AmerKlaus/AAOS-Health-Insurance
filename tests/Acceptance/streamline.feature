Feature: Streamlined Onboarding Process

  In order to improve efficiency in onboarding new claimants
  As an admin
  I need to provide pre-filled forms and guided submission instructions

  Scenario: Onboarding new claimants
    Given a new claimant accesses the onboarding process
    And they are provided with pre-filled forms and guided submission instructions
    When they follow the guided instructions to complete the onboarding process
    Then they should be able to submit their claim easily
    And the system should validate the submitted information for accuracy and completeness
    And the claimant should receive confirmation of successful submission
