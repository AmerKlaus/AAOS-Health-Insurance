Feature: Automatic Premium Payments Enrollment

In order to avoid policy lapses
As a user
I need the option to enroll in automatic premium payments

Scenario: Enrolling in automatic premium payments
  Given I am logged into the system as a user
  And I navigate to the payment settings
  When I choose to enroll in automatic premium payments
  And I provide my payment details and authorization
  Then my payments should be automatically processed to avoid policy lapses

Scenario: Managing automatic premium payments enrollment
  Given I am logged into the system as a user
  And I have already enrolled in automatic premium payments
  When I view my payment settings
  Then I should see the status of my automatic payments enrollment
  And I should be able to update or cancel automatic premium payments if needed
