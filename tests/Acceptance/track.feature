Feature: Track Claim Status
  In order to ensure timely resolution
  As an admin
  I need to track the status of each claim in real-time

  Scenario: Tracking claim status
    Given I am logged into the system
    When I navigate to the claim status tracking page
    Then I should be able to view the real-time status of all claims
