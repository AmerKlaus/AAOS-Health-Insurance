Feature: Online Policy Endorsements

  In order to request policy endorsements or modifications conveniently
  As a user
  I need to be able to do so online without lengthy paperwork

  Scenario: Requesting policy endorsements online
    Given I am logged into the system as a user
    When I navigate to the policy endorsements section
    And request an endorsement or modification
    Then my request should be processed without requiring extensive paperwork

