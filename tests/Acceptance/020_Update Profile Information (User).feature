Feature: Profile Information Update

  In order to maintain accurate profile information
  As a user
  I want to be able to update my contact details or address

  Scenario: Updating profile information
    Given I am logged in as a user
    And I have navigated to the profile settings page
    When I locate the section for updating contact details or address
    And I provide the updated information, such as a new phone number or address
    And I save the changes
    Then my profile information should be successfully updated
    And I should receive confirmation that the changes have been saved
    And when I revisit the profile settings page, the updated information should be reflected
    And any previous information should be overwritten with the new details
