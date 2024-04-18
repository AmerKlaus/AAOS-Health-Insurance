Feature: Password Reset

  In order to recover my account
  As a user
  I need to reset my password securely through email verification

  Scenario: Resetting password via email
    Given I have forgotten my password
    When I request a password reset
    Then I should receive an email with instructions to reset my password
