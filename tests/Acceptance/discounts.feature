Feature: Discount/Savings Notifications

In order to take advantage of discounts or savings opportunities
As a user
I need to receive notifications about them

Scenario: Receiving discount/savings notifications via email
  Given I am logged into the system as a user
  And I have subscribed to receive notifications about discounts and savings
  When a potential discount or savings opportunity becomes available
  Then the system should send me an email notification with details about the offer
  And the email should include information on how to avail of the discount or savings opportunity

Scenario: Receiving in-app discount/savings notifications
  Given I am logged into the system as a user
  And I have opted to receive in-app notifications about discounts and savings
  When a potential discount or savings opportunity is available
  Then the system should display a notification within the app interface
  And the notification should provide details about the offer and how to take advantage of it
