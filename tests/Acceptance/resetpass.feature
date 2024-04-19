Feature: Password Reset

  In order to recover my account
  As a user
  I need to reset my password securely through email verification

  Scenario: Resetting password via email
    Given I have forgotten my password
    When I request a password reset
    Then I should receive an email with instructions to reset my password
    And the email should contain a unique link for password reset
    And the link should expire after a certain period of time for security purposes
    And the instructions should clearly guide me through the password reset process, including verifying my identity

  Scenario: Failed password reset request
    Given I have requested a password reset
    When the system encounters an error processing the request
    Then I should receive an error message indicating that the password reset request failed
    And I should be provided with instructions on how to proceed, such as contacting customer support for assistance
    And I should not receive an email for password reset
