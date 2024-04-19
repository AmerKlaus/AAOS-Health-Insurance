Feature: User-Friendly Claim Submission Interface

  In order to submit claims easily
  As a user
  I need a user-friendly interface that guides me through the process

  Scenario: Using the user-friendly interface for claim submission
    Given I am logged into the system as a user
    And I have navigated to the claim submission section
    When I follow the step-by-step instructions provided by the interface
    Then I should see clear and concise guidance on how to submit my claim
    And I should be guided through each required step of the submission process, such as providing claim details, uploading supporting documents, and confirming submission
    And I should be able to easily navigate back and forth between steps if needed
    And once all necessary information is provided and steps are completed, I should be able to submit my claim without difficulties
    And I should receive confirmation that my claim has been successfully submitted
    And I should have the option to review the submitted claim details for verification

  Scenario: Editing a submitted claim
    Given I have submitted a claim through the user-friendly interface
    When I navigate to the submitted claims section
    And select the claim I want to edit
    Then I should be able to access and modify the details of the submitted claim
    And after making the necessary changes, I should be able to resubmit the updated claim
    And I should receive confirmation that the claim has been successfully updated and resubmitted
