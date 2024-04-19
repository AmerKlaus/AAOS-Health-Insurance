Feature: Submitting Feedback or Complaints

In order to provide feedback or complaints
As a user
I need to be able to do so directly through the web application

Scenario: Submitting feedback through the web application
  Given I am logged into the system as a user
  And I have navigated to the feedback/complaints section
  When I provide detailed feedback or submit a complaint
  Then the system should record my feedback/complaint along with relevant details such as timestamp and user information
  And I should receive a confirmation message that my feedback/complaint has been successfully submitted
