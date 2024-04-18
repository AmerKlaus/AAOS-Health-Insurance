Feature: Profile Information Update

  In order to maintain accurate profile information
  As a user
  I want to be able to update my contact details or address

  Scenario: Updating profile information
    Given I am logged in as a user
    When I navigate to the profile settings
    And update my contact details or address
    Then my profile information should be successfully updated
