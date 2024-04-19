Feature: View Claim Interactions and Add Audit Results

  In order to maintain comprehensive records and ensure compliance
  As an admin
  I want to view a claim with all associated interactions and add audit results

  Scenario: Viewing all interactions associated with a claim
    Given I am logged in as an admin
    And there are existing interactions related to the claim
    When I navigate to the admin dashboard
    And select the option to view a specific claim
    Then I should see detailed information about the claim, including its status, date of submission, and relevant details
    And I should be able to access a comprehensive list of all interactions linked to that claim, displaying timestamps, types of interactions, and any associated comments or notes

  Scenario: Adding audit results to a claim
    Given I am logged in as an admin
    And I am viewing a specific claim
    When I choose to add audit results
    And provide detailed information such as the audit date, auditor's name, and audit findings
    Then the audit results should be successfully attached to the claim
    And the claim's status should be updated to reflect the audit completion
    And I should receive a confirmation message indicating the successful addition of audit results
