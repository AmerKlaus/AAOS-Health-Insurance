Feature: Self-Service Tools for Claim Tracking and Document Upload

  In order to empower customers and streamline claim management
  As an admin
  I need to provide self-service tools for claim tracking and document upload

  Scenario: Tracking claim progress
    Given I am a logged-in customer
    When I navigate to the claim tracking section
    Then I should be able to view the progress of my claims
    And the status of each claim should be clearly displayed, indicating whether it's pending, in progress, or resolved
    And I should have the option to view detailed information about each claim, including claim ID, submission date, and any associated interactions or notes

  Scenario: Uploading additional documents
    Given I am a logged-in customer
    When I access my claim details
    And choose to upload additional documents
    Then I should be able to select and upload the documents
    And the documents should be successfully added to my claim
    And I should receive confirmation that the documents have been uploaded successfully
    And the updated claim details should reflect the newly added documents
