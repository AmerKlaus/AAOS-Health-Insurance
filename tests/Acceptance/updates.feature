Feature: Claim Status Updates

  In order to stay informed about my claim status
  As a user
  I need to receive updates via email or SMS

  Scenario: Receiving claim status updates
    Given I have submitted a claim
    When there is a status change in my claim
    Then I should receive an email or SMS notification with the updated status
    And the notification should include details such as the claim ID, the previous status, the new status, and any additional relevant information
    And the notification should be sent to the email address or phone number associated with my account
