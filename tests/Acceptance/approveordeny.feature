Feature: Approve or Deny Claims
  In order to ensure compliance with policy criteria
  As an admin
  I need to approve or deny claims

  Scenario: Approving a claim
    Given I review a submitted claim
    When the claim meets all policy criteria
    Then I should be able to approve the claim

  Scenario: Denying a claim
    Given I review a submitted claim
    When the claim does not meet policy criteria
    Then I should be able to deny the claim
