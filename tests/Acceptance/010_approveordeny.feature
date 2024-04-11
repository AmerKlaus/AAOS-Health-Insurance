Feature: Approve or Deny Claims
  In order to ensure compliance with policy criteria
  As an admin
  I need to approve or deny claims

  Scenario: Approving a claim
    Given I review a submitted claim "title"
    When I click "approve"
    Then I see "title" in the list of "approved" claims

  Scenario: Denying a claim
    Given I review a submitted claim "title2"
    When I click "deny"
    Then I see "title2" in the list of "denied" claims
