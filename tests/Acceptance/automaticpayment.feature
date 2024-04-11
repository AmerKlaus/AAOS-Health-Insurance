Feature: Automatic Premium Payments Enrollment

In order to avoid policy lapses
As a user
I need the option to enroll in automatic premium payments

Scenario: Enrolling in automatic premium payments
Given I am logged into the system as a user
When I navigate to the payment settings
And enroll in automatic premium payments
Then my payments should be automatically processed to avoid policy lapses
