Feature: Easy Claim Document Submission

  In order to submit claim documents conveniently
  As a user
  I need to be able to upload documents through the web application

  Scenario: Uploading claim documents
    Given I am logged in as a user
    When I navigate to the claim submission section
    And upload required documents
    Then the documents should be successfully submitted with the claim
