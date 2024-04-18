Feature: Self-Service Tools for Claim Tracking and Document Upload

  In order to empower customers and streamline claim management
  As an admin
  I need to provide self-service tools for claim tracking and document upload

  Scenario: Tracking claim progress
    Given I am a logged-in customer
    When I navigate to the claim tracking section
    Then I should be able to view the progress of my claims

  Scenario: Uploading additional documents
    Given I am a logged-in customer
    When I access my claim details
    And upload additional documents
    Then the documents should be successfully added to my claim
